### Changes

This release changes the root API client class from `BigCommerce\ApiV3\Client` 
to `BigCommerce\ApiV3\BaseApiClient`. The interface is unchanged, this abstract class
has been added to allow for a common parent to both the V3 and V2 apis.

### New Features

 - Add support for creating Orders via the V2 API. It's a bit rough at the moment,
   but since this hasn't been implemented in BigCommerce V3 yet, it will do. In the future
   this will be removed in favour of a V3 API.
