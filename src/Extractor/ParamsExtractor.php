<?php
/**
 * ze-content-validation (https://github.com/func0der/ze-content-validation)
 *
 * @copyright Copyright (c) 2017 MVLabs(http://mvlabs.it)
 * @copyright Copyright (c) 2021 func0der
 * @license   MIT
 */

declare(strict_types=1);

namespace ZE\ContentValidation\Extractor;

use Mezzio\Router\RouterInterface;
use Psr\Http\Message\ServerRequestInterface;

class ParamsExtractor implements DataExtractorInterface
{
    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @return array<string, mixed>
     */
    public function extractData(ServerRequestInterface $request): array
    {
        return $this->router->match($request)->getMatchedParams();
    }
}
