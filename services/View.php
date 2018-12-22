<?php
namespace Services;

use UnexpectedValueException;
use BadMethodCallException;
use Psr\Log\InvalidArgumentException;

class View
{
    const VIEW_BASE_PATH = '/resources/views/';

    public $view;
    public $data;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function __call($method, $parameters)
    {
        if (!starts_with($method, 'with')) {
            throw new BadMethodCallException("方法 {$method} 不存在！");
        }

        return $this->with(snake_case(substr($method, 4)), $parameters[0]);
    }

    public static function make($viewName = null)
    {
        if (!$viewName) {
            throw new InvalidArgumentException("视图名称不能为空！");
        }

        $viewFilePath = self::getFilePath($viewName);
        if (!is_file($viewFilePath)) {
            throw new UnexpectedValueException("试图文件不存在！");
        }

        return new View($viewFilePath);
    }

    public function with($key, $value = null)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public static function getFilePath($viewName)
    {
        $filePath = str_replace('.', '/', $viewName);
        return  BASE_PATH . self::VIEW_BASE_PATH . $filePath . '.php';
    }
}