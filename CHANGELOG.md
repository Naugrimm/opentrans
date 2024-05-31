# 2.x

## BREAKING CHANGES

See the [CHANGELOG.md of naugrim/bmecat](https://github.com/Naugrimm/bmecat/blob/develop/CHANGELOG.md). Everything mentioned where also applies to `naugrim/opentrans`.

- `UdxAggregate` has been removed. 
- `\Naugrim\OpenTrans\Nodes\Order\Info::$udxItem` bas been renamed to `\Naugrim\OpenTrans\Nodes\Order\Info::$headerUdx` to be in line with the naming of the other attributes
- The property `udxItem` has been moved out of the `HasUdxItems` trait into the parent classes using it.
