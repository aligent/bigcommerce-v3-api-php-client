<?php

namespace BigCommerce\ApiV3\Api\Generic;

abstract class UuidCompleteResourceApi extends UuidResourceApi
{
    use CreateResource;
    use DeleteResource;
    use GetAllResources;
    use GetResource;
    use UpdateResource;
}
