# 2.x

## BREAKING CHANGES

See the [CHANGELOG.md of naugrim/bmecat](https://github.com/Naugrimm/bmecat/blob/develop/CHANGELOG.md). Everything mentioned where also applies to `naugrim/opentrans`.

- `UdxAggregate` has been removed. 
- `\Naugrim\OpenTrans\Nodes\Order\Info::$udxItem` bas been renamed to `\Naugrim\OpenTrans\Nodes\Order\Info::$headerUdx` to be in line with the naming of the other attributes
- The property `udxItem` has been moved out of the `HasUdxItems` trait into the parent classes using it.
- `\Naugrim\OpenTrans\Nodes\OrderResponse\Info::$date` has been renamed to `\Naugrim\OpenTrans\Nodes\OrderResponse\Info::$orderResponseDate`
- Many elements have been corrected so that they conform to the OpenTRANS spec. Especially some elements previously having a single type are now correctly treated as an array of this type. As we are now using PHPs type system, this should immediately explode.

## Known Issues

The XML will not be valid when you use more than one `EMAIL` together with more than one `PUBLIC_KEY` each belonging to different Email-addresses. The Serializer will first serialize all email addresses and then all public keys.
