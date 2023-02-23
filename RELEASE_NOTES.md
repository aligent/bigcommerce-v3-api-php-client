### Fixes

- Fix incorrect endpoint and method for Create Redirect Urls (thanks @Mosnar)
- Updated storeinformation controller to match others (thanks @joelreeds)
- Fixed incorrect endpoint on OrdersApi (thanks @simpleapps-io)
- Handle the case of no orders returned in the V2 api causing error. (Issue #161)
- Fix `preorder_release_date` property type (Issue #162)


### New Features

- Allow overriding of most Guzzle Client defaults, and also set a timeout