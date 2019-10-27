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

namespace ReCaptcha;

***REMOVED***
***REMOVED*** Stores and formats the parameters for the request to the reCAPTCHA service.
***REMOVED*****REMOVED***
class RequestParameters
***REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** The shared key between your site and reCAPTCHA.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $secret;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** The user response token provided by reCAPTCHA, verifying the user on your site.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $response;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Remote user's IP address.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $remoteIp;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Client version.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $version;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Initialise parameters.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $secret Site secret.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $response Value from g-captcha-response form field.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $remoteIp User's IP address.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $version Version of this client library.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function __construct($secret, $response, $remoteIp = null, $version = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->secret = $secret;
        $this->response = $response;
        $this->remoteIp = $remoteIp;
        $this->version = $version;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Array representation.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return array Array formatted parameters.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function toArray()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $params = array('secret' => $this->secret, 'response' => $this->response);

        if (!is_null($this->remoteIp))***REMOVED*****REMOVED***
            $params['remoteip'] = $this->remoteIp;
***REMOVED***

        if (!is_null($this->version))***REMOVED*****REMOVED***
            $params['version'] = $this->version;
***REMOVED***

        return $params;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Query string representation for HTTP request.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return string Query string formatted parameters.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function toQueryString()
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        return http_build_query($this->toArray(), '', '&');
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***
