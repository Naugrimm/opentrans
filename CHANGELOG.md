# 5.x

### BREAKING CHANGES

- **SchemaValidator root node validation**: The SchemaValidator now checks if the XML-root-element matches the expected type for this OpenTRANS document.
- The optional `$documentType`-Parameter passed to `\Naugrim\OpenTrans\SchemaValidator::isValid`. The parameter was completely unused before und now must be either `NULL` or the class-string of a class implementing `\Naugrim\OpenTrans\Contracts\OpentransDocumentNode`
- If the `$documentType` is not given or `NULL`, the behaviour did not change. In this case, the SchemaValidator continues to just validate against the OpenTRANS XSD. 

# 4.x

### BREAKING CHANGES

- **PHP 8.4 Required**: Minimum PHP version is now 8.4. Projects using older PHP versions must upgrade.
- **BMEcat Dependency Upgrade**: Upgraded `naugrim/bmecat` from ^5.0 to ^6.0. See the [BMEcat CHANGELOG.md](https://github.com/Naugrimm/bmecat/blob/develop/CHANGELOG.md) for additional breaking changes that may affect your implementation.

### Added

- **Documentation**: OpenTRANS specification documents and examples are now included directly in the repository under `docs/opentrans-docs/`, including:
  - Complete OpenTRANS 2.1 specification PDFs in German and English
  - XSD schema files for validation
  - Sample XML documents
- **Enhanced Type Safety**: Improved type hints throughout the codebase for better static analysis and IDE support

### Changed

- **Development Dependencies**: Upgraded development tools:
  - PHPUnit upgraded to version 12
  - PHPStan upgraded to version 2
  - Updated Rector configuration for PHP 8.4 standards
- **Code Quality**: Added constant type hints

### Fixed

- **Type Hints**: Added missing constant type hints in `PartyId`, `PartyRole`, `Card`, `PaymentTerm`, and `OpenTrans` classes

# 3.x

## BREAKING CHANGES

Upgraded `naugrim/bmecat` to ^5. See the [CHANGELOG.md of naugrim/bmecat](https://github.com/Naugrimm/bmecat/blob/develop/CHANGELOG.md). Everything mentioned there also applies to `naugrim/opentrans`.

# 2.x

## BREAKING CHANGES

See the [CHANGELOG.md of naugrim/bmecat](https://github.com/Naugrimm/bmecat/blob/develop/CHANGELOG.md). Everything mentioned there also applies to `naugrim/opentrans`.

- `UdxAggregate` has been removed. 
- `\Naugrim\OpenTrans\Nodes\Order\Info::$udxItem` bas been renamed to `\Naugrim\OpenTrans\Nodes\Order\Info::$headerUdx` to be in line with the naming of the other attributes
- The property `udxItem` has been moved out of the `HasUdxItems` trait into the parent classes using it.
- `\Naugrim\OpenTrans\Nodes\OrderResponse\Info::$date` has been renamed to `\Naugrim\OpenTrans\Nodes\OrderResponse\Info::$orderResponseDate`
- Many elements have been corrected so that they conform to the OpenTRANS spec. Especially some elements previously having a single type are now correctly treated as an array of this type. As we are now using PHPs type system, this should immediately explode.

## Known Issues

The XML will not be valid when you use more than one `EMAIL` together with more than one `PUBLIC_KEY` each belonging to different Email-addresses. The Serializer will first serialize all email addresses and then all public keys.
