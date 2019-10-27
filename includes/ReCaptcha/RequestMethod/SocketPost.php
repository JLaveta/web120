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

use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod;
use ReCaptcha\RequestParameters;

***REMOVED***
***REMOVED*** Sends a POST request to the reCAPTCHA service, but makes use of fsockopen()
***REMOVED*** instead of get_file_contents(). This is to account for people who may be on
***REMOVED*** servers where allow_url_open is disabled.
***REMOVED*****REMOVED***
class SocketPost implements RequestMethod
***REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Socket to the reCAPTCHA service
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var Socket
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $socket;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Only needed if you want to override the defaults
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param \ReCaptcha\RequestMethod\Socket $socket optional socket, injectable for testing
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $siteVerifyUrl URL for reCAPTCHA siteverify API
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function __construct(Socket $socket = null, $siteVerifyUrl = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->socket = (is_null($socket)) ? new Socket() : $socket;
        $this->siteVerifyUrl = (is_null($siteVerifyUrl)) ? ReCaptcha::SITE_VERIFY_URL : $siteVerifyUrl;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Submit the POST request with the specified parameters.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param RequestParameters $params Request parameters
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return string Body of the reCAPTCHA response
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function submit(RequestParameters $params)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $errno = 0;
        $errstr = '';
        $urlParsed = parse_url($this->siteVerifyUrl);

        if (false === $this->socket->fsockopen('ssl://' . $urlParsed['host'], 443, $errno, $errstr, 30))***REMOVED*****REMOVED***
            return '***REMOVED***"success": false, "error-codes": ["'.ReCaptcha::E_CONNECTION_FAILED.'"]***REMOVED***';
***REMOVED***

        $content = $params->toQueryString();

        $request = "POST " . $urlParsed['path'] . " HTTP/1.1\r\n";
        $request .= "Host: " . $urlParsed['host'] . "\r\n";
        $request .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $request .= "Content-length: " . strlen($content) . "\r\n";
        $request .= "Connection: close\r\n\r\n";
        $request .= $content . "\r\n\r\n";

        $this->socket->fwrite($request);
        $response = '';

        while (!$this->socket->feof())***REMOVED*****REMOVED***
            $response .= $this->socket->fgets(4096);
***REMOVED***

        $this->socket->fclose();

        if (0 !== strpos($response, 'HTTP/1.1 200 OK'))***REMOVED*****REMOVED***
            return '***REMOVED***"success": false, "error-codes": ["'.ReCaptcha::E_BAD_RESPONSE.'"]***REMOVED***';
***REMOVED***

        $parts = preg_split("#\n\s*\n#Uis", $response);

        return $parts[1];
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***
