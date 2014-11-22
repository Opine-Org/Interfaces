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

interface Cache {
    public function __construct ($host='localhost', $port=11211);
    public function set ($key, $value, $expire=0, $flag=2);
    public function get ($key, $host='localhost', $port=11211, $flag=2);
    public function delete ($key, $timeout=0, $host='localhost');
    public function getSetGet ($key, $callback, $ttl=0, $host='localhost', $port=11211, $flag=2);
    public function getSetGetBatch (Array &$keyCallbacks, $ttl=0, $host='localhost', $port=11211, $flag=2);
    public function getBatch (Array &$items, $host='localhost', $port=11211, $flag=2);
    public function deleteBatch (Array $items, $host='localhost', $port=11211);
}

interface Container {}

interface Config {}

interface DB {}

interface Route {}