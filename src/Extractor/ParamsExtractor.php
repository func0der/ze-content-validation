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

use Psr\Http\Message\RequestInterface;
use Mezzio\Router\RouterInterface;

/**
 * Class ParamsExtractor
 *
 * @package ZE\ContentValidation\Extractor
 * @author  Diego Drigani <d.drigani@mvlabs.it>
 */
class ParamsExtractor implements DataExtractorInterface
{
    /**
     * @var RouterInterface $route
     */
    private $router;

    /**
     * OptionsExtractor constructor.
     *
     * @param RouterInterface $router
     * @internal param array $config
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function extractData(RequestInterface $request)
    {
        $routeResult = $this->router->match($request);
        return $routeResult->getMatchedParams();
    }
}
