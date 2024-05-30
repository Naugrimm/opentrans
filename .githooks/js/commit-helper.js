import fs from "fs";
import path from 'path';
function getCurrentBranchName(p = process.cwd()) {
  const gitHeadPath = `${p}/.git/HEAD`;

  return fs.existsSync(p) ?
         fs.existsSync(gitHeadPath) ?
         fs.readFileSync(gitHeadPath, 'utf-8').trim().split('/').slice(2).join('/') :
         getCurrentBranchName(path.resolve(p, '..')) :
         false
}

function issueIdFromBranchName(branchName)
{
  let matches = branchName.match(/\/(#\d+)/);
  if (matches) {
    return matches[1];
  }
  matches = branchName.match(/^(\d+)/);
  if (matches) {
    return '#'+matches[1];
  }

  return null;
}

const validMessagePrefixes = /^(fix|feat|build|chore|ci|docs|style|refactor|perf|test):/;

const validIssueidPrefixes = /^(refs|issueid|starts|fixes) #/gm;
const validTimeTrackingEntryRegex = /(@[\d.]+[smh]?\b)/;

const branchToPrefixMap = {
  '^feat': 'feat',
  '^bugfix': 'fix',
  '^hotfix': 'fix',
};

const validateCommitMessage = (message) => {
  let result = true;
  if (!message.match(validMessagePrefixes)) {
    console.error("The commit message does not contain a valid prefix: "+validMessagePrefixes);
    result = false;
  }

  if (!message.match(validIssueidPrefixes)) {
    console.error("The commit message does not contain an issue id: "+message);
      result = false;
  }

  if (!message.match(validTimeTrackingEntryRegex)) {
    console.error("The commit message does not contain a time tracking entry: "+message);
      result = false;
  }
  return result;
}

const hookMustRun = (hook) => {
  if (process.env.CI) {
    return false;
  }

  const p = process.cwd();
  const gitMergeHeadPath = `${p}/.git/MERGE_HEAD`;

  return !fs.existsSync(gitMergeHeadPath);


}

export default {
  getCurrentBranchName,
  issueIdFromBranchName,
  validMessagePrefixes,
  validIssueidPrefixes,
  validTimeTrackingEntryRegex,
  branchToPrefixMap,
  validateCommitMessage,
  hookMustRun,
}
