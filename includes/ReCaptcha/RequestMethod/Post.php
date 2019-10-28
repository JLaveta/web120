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
***REMOVED*** Sends POST requests to the reCAPTCHA service.
***REMOVED*****REMOVED***
class Post implements RequestMethod
***REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** URL for reCAPTCHA siteverify API
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $siteVerifyUrl;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Only needed if you want to override the defaults
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $siteVerifyUrl URL for reCAPTCHA siteverify API
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function __construct($siteVerifyUrl = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
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
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $params->toQueryString(),
                // Force the peer to validate (not needed in 5.6.0+, but still works)
                'verify_peer' => true,
            ),
        );
        $context = stream_context_create($options);
        $response = file_get_contents($this->siteVerifyUrl, false, $context);

        if ($response !== false)***REMOVED*****REMOVED***
            return $response;
***REMOVED***

        return '***REMOVED***"success": false, "error-codes": ["'.ReCaptcha::E_CONNECTION_FAILED.'"]***REMOVED***';
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***