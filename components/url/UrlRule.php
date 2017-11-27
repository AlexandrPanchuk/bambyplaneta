<?php

namespace app\components\url;

use yii\web\UrlRule as WebUrlRule;
use yii\web\UrlRuleInterface;

/**
 * UrlRule abstract class
 */
abstract class UrlRule extends WebUrlRule implements UrlRuleInterface
{
    /** @var string path of request */
    public $path;

    /** @var array pieces of path*/
    public $piece;

    public $pattern = '';

    public $route = '';

    /**
     * Primary check rules
     * @return array
     */
    abstract public function rules();

    /**
     * Create URL using params
     * @param type $manager
     * @param type $route
     * @param type $params
     */
    public function createUrl( $manager, $route, $params )
    {
    }

    /**
     * Parse URL
     * @param type $manager
     * @param type $request
     * @return type
     */
    public function parseRequest( $manager, $request )
    {
        return $this->validate($request);
    }

    public function validate( $request )
    {
        $result = true;

        $this->path  = $request->pathInfo;
        $this->piece = explode('/', $this->path);

        foreach ($this->rules() as $rule) {
            $method = $rule['method'];
            $target = $this->resolveTarget($rule);
            $result = $this->$method($target, $rule);

            if ( !$result ) { break; }
        }

        return $result;
    }

    public function resolveTarget( $rule )
    {
        if (isset($rule['target']))
            $target = $rule['target'];
        if (is_string($target) && isset($this->$target))
            $target = $this->$target;
        if (isset($rule['number'])) {
            if (!isset($target[$rule['number']]))
                $target = false;
            else
                $target = $target[$rule['number']];
        }
        return $target;
    }

    public function notEmpty( $target, $rule )
    {
        return !empty($target);
    }

    public function exact( $target, $rule )
    {
        return $target == $rule['value'];
    }

    public function match( $target, $rule )
    {
        return preg_match($rule['regexp'], $target);
    }

    public function range( $target, $rule )
    {
        return in_array($target, $rule['range']);
    }
}
