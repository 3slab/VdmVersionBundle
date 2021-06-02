<?php

namespace Vdm\Bundle\VersionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Vdm\Bundle\VersionBundle\Services\VersionRegistry;

/**
 * VersionController
 */
class VersionController
{
    public const HEADER_SECRET = 'VDM-Version-Secret';

    /**
     * @var string|null
     */
    protected $secret;

    /**
     * @var VersionRegistry
     */
    protected $registry;

    /**
     * VersionController constructor.
     *
     * @param VersionRegistry $registry
     * @param string|null $secret
     */
    public function __construct(VersionRegistry $registry, ?string $secret)
    {
        $this->registry = $registry;
        $this->secret = $secret;
    }

    /**
     * version route
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function version(Request $request): JsonResponse
    {
        $secret = $request->get('secret', null) ?? $request->headers->get(static::HEADER_SECRET, null) ?? null;

        $content = [];
        if (($this->secret === null) || ($secret === $this->secret)) {
            $content = $this->registry->all();
        }

        return new JsonResponse($content);
    }
}
