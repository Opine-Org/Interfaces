<?php
/**
 * Opine\Interfaces
 *
 * Copyright (c)2013, 2014 Ryan Mahoney, https://github.com/Opine-Org <ryan@virtuecenter.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace Opine\Interfaces;
use Closure;
use ArrayObject;
use MongoCursor;

interface Cache {
    public function set ($key, $value, $expire);
    public function get ($key);
    public function delete ($key, $timeout);
    public function getSetGet ($key, Closure $callback, $ttl);
    public function getSetGetBatch (Array &$items, $ttl);
    public function getBatch (Array &$items);
    public function deleteBatch (Array $items, $timeout);
}

interface Config {
    public function get ($key);
}

interface Container {
    public function set ($serviceName, $value, $scope, Array $arguments, Array $calls);
    public function get ($serviceName);
}

interface DB {
    public function userIdSet ($userId);
    public function collectionList ($system);
    public function collection ($collection);
    public function each (MongoCursor $cursor, Closure $callback);
    public function id ($id);
    public function mapReduce ($map, $reduce, Array $command, &$response, $fetch);
    public function document ($dbURI, $document);
    public function distinct ($collection, $key, Array $query);
    public function fetchAllGrouped (MongoCursor $cursor, $key, $value);
    public function date ($dateString);
}

interface DBDocument {
    public function increment ($field, $value);
    public function decrement ($field, $value);
    public function upsert (Array $document);
    public function remove ();
    public function current ();
    public function collection ();
    public function id ();
    public function get ($field);
    public function checkByCriteria (Array $criteria);
}

interface Topic {
    public function subscribe ($topic, $callback);
    public function publish ($topic, ArrayObject $context);
}

interface Route {
    public function pathGet ();
    public function queryStringGet ();
    public function getGet ();
    public function before ($callback);
    public function after ($callback);
    public function purgeAfter();
    public function purgeBefore ();
    public function get ($pattern, $callback);
    public function post ($pattern, $callback);
    public function delete ($pattern, $callback);
    public function patch ($pattern, $callback);
    public function put ($pattern, $callback);
    public function show ();
    public function execute (Array $callable, Array $parameters, Array $beforeActionsIn, Array $afterActionsIn);
    public function run ();
    public function runNamed ($name);
    public function namedRoutesGet ();
    public function redirect ();
    public function service ($name);
    public function serviceMethod ($compositeName);
}

interface Layout {
    public function make ($config, $container, Array $context, $debug);
    public function config ($paths, Array $context, $debug);
    public function container ($paths, Array $context, $debug);
}

interface LayoutContainer {
    public function region ($id, Array $region);
    public function url ($id, $url);
    public function args ($id, Array $args);
    public function partial ($id, $partial);
    public function data ($id, $data, $type);
    public function write ();
    public function render ($mode);
}