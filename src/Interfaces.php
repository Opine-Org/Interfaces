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
use MongoCursor;

interface Cache {
    public function set ($key, $value, $expire, $flag);
    public function get ($key, $flag);
    public function delete ($key, $timeout);
    public function getSetGet ($key, Closure $callback, $ttl, $flag);
    public function getSetGetBatch (Array &$items, $ttl, $flag);
    public function getBatch (Array &$items, $flag);
    public function deleteBatch (Array $items, $timeout);
}

interface Config {
    public function cacheSet (Array $config);
    public function get ($key);
}

interface Container {
    public function set ($serviceName, $value, $scope, $arguments, $calls);
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
    public function fetchAllGrouped (MongoCursor $cursor, $key, $value, $assoc);
    public function date ($dateString);
}

interface Topic {
    public function subscribe ($topic, $callback);
    public function publish ($topic, Array $context);
}

interface Route {}