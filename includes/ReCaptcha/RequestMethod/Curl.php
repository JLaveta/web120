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
***REMOVED*** Convenience wrapper around the cURL functions to allow mocking.
***REMOVED*****REMOVED***
class Curl
***REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/curl_init
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $url
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return resource cURL handle
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function init($url = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return curl_init($url);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/curl_setopt_array
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param resource $ch
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param array $options
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return bool
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function setoptArray($ch, array $options)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return curl_setopt_array($ch, $options);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/curl_exec
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param resource $ch
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return mixed
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function exec($ch)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return curl_exec($ch);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @see http://php.net/curl_close
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param resource $ch
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function close($ch)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        curl_close($ch);
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***
