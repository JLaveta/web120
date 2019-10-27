***REMOVED***
***REMOVED***
***REMOVED*** This is a PHP library that handles calling reCAPTCHA.
***REMOVED***
***REMOVED*** BSD 3-Clause License
***REMOVED*** @copyright (c) 2019, Google Inc.
***REMOVED*** @link https://www.google.com/recaptcha
***REMOVED*** All rights reserved.
***REMOVED***
***REMOVED*** Redistribution and use in source and binary forms, with or without
***REMOVED*** modification, are permitted provided that the following conditions are met:
***REMOVED*** 1. Redistributions of source code must retain the above copyright notice, this
***REMOVED***    list of conditions and the following disclaimer.
***REMOVED***
***REMOVED*** 2. Redistributions in binary form must reproduce the above copyright notice,
***REMOVED***    this list of conditions and the following disclaimer in the documentation
***REMOVED***    and/or other materials provided with the distribution.
***REMOVED***
***REMOVED*** 3. Neither the name of the copyright holder nor the names of its
***REMOVED***    contributors may be used to endorse or promote products derived from
***REMOVED***    this software without specific prior written permission.
***REMOVED***
***REMOVED*** THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
***REMOVED*** AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
***REMOVED*** IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
***REMOVED*** DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
***REMOVED*** FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
***REMOVED*** DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
***REMOVED*** SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
***REMOVED*** CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
***REMOVED*** OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
***REMOVED*** OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
***REMOVED*****REMOVED***

namespace ReCaptcha\RequestMethod;

***REMOVED***
***REMOVED*** Convenience wrapper around native socket and file functions to allow for
***REMOVED*** mocking.
***REMOVED*****REMOVED***
class Socket
***REMOVED***
    private $handle = null;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** fsockopen
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/fsockopen
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $hostname
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param int $port
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param int $errno
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $errstr
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param float $timeout
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return resource
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function fsockopen($hostname, $port = -1, &$errno = 0, &$errstr = '', $timeout = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->handle = fsockopen($hostname, $port, $errno, $errstr, (is_null($timeout) ? ini_get("default_socket_timeout") : $timeout));

        if ($this->handle != false && $errno === 0 && $errstr === '')***REMOVED*****REMOVED***
            return $this->handle;
***REMOVED***
        return false;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** fwrite
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/fwrite
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param int $length
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return int | bool
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function fwrite($string, $length = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return fwrite($this->handle, $string, (is_null($length) ? strlen($string) : $length));
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** fgets
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/fgets
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param int $length
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function fgets($length = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return fgets($this->handle, $length);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** feof
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/feof
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return bool
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function feof()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return feof($this->handle);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** fclose
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/fclose
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return bool
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function fclose()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return fclose($this->handle);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***
