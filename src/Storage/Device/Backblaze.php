<?php

namespace Utopia\Storage\Device;

use Utopia\Storage\Device\S3;

class Backblaze extends S3
{
    /**
     * Regions constants
     *
     */
    const US_WEST_0 = 'us-west-000';
    const US_WEST_1 = 'us-west-001';
    const US_WEST_2 = 'us-west-002';

    /**
     * Backblaze Constructor
     *
     * @param string $root
     * @param string $accessKey
     * @param string $secretKey
     * @param string $bucket
     * @param string $region
     * @param string $acl
     */
    public function __construct(string $root, string $accessKey, string $secretKey, string $bucket, string $region = self::US_WEST_2, string $acl = self::ACL_PRIVATE)
    {
        parent::__construct($root, $accessKey, $secretKey, $bucket, $region, $acl);
        $this->headers['host'] = $bucket . '.s3' . '.' . $region . '.backblazeb2.com';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Backblaze Storage';
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Backblaze Storage';
    }
}
