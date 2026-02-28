<?php

namespace Asaas\Laravel\Http;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class ModelConverter
{
    public static function toArray(Response $response): array
    {
        return $response->json() ?? [];
    }

    /**
     * @template T of object
     * @param class-string<T> $class
     * @return T
     */
    public static function toObject(Response $response, string $class): object
    {
        $data = self::toArray($response);
        return self::fromArray($data, $class);
    }

    /**
     * @template T of object
     * @param array<string, mixed> $data
     * @param class-string<T> $class
     * @return T
     */
    public static function fromArray(array $data, string $class): object
    {
        if (method_exists($class, 'fromArray')) {
            return $class::fromArray($data);
        }
        if (method_exists($class, 'from')) {
            return $class::from($data);
        }
        return (new \ReflectionClass($class))->newInstanceArgs(
            self::mapConstructorArgs($data, $class)
        );
    }

    /** @param array<string, mixed> $data */
    private static function mapConstructorArgs(array $data, string $class): array
    {
        $ctor = (new \ReflectionClass($class))->getConstructor();
        if ($ctor === null) {
            return [];
        }
        $args = [];
        foreach ($ctor->getParameters() as $param) {
            $name = $param->getName();
            $key = Str::snake($name);
            $value = Arr::get($data, $key, Arr::get($data, $name));
            $args[] = $value;
        }
        return $args;
    }

    public static function toJson(mixed $model): string
    {
        if (is_array($model)) {
            return json_encode($model, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        if (method_exists($model, 'toArray')) {
            return json_encode($model->toArray(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        return json_encode($model, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
