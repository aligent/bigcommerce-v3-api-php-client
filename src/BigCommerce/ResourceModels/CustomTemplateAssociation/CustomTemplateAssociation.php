<?php
namespace BigCommerce\ApiV3\ResourceModels\CustomTemplateAssociation;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomTemplateAssociation extends ResourceModel
{
    public int $id;
    public int $channel_id;
    public string $entity_type;
    public int $entity_id;
    public string $file_name;
    public ?bool $is_valid;
    public string $date_created;
    public string $date_modified;
}
