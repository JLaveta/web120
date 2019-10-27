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
***REMOVED*** Sends cURL request to the reCAPTCHA service.
***REMOVED*** Note: this requires the cURL extension to be enabled in PHP
***REMOVED*** @see http://php.net/manual/en/book.curl.php
***REMOVED*****REMOVED***
class CurlPost implements RequestMethod
***REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Curl connection to the reCAPTCHA service
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var Curl
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $curl;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** URL for reCAPTCHA siteverify API
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @var string
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    private $siteVerifyUrl;

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Only needed if you want to override the defaults
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param Curl $curl Curl resource
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param string $siteVerifyUrl URL for reCAPTCHA siteverify API
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function __construct(Curl $curl = null, $siteVerifyUrl = null)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $this->curl = (is_null($curl)) ? new Curl() : $curl;
        $this->siteVerifyUrl = (is_null($siteVerifyUrl)) ? ReCaptcha::SITE_VERIFY_URL : $siteVerifyUrl;
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***

***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** Submit the cURL request with the specified parameters.
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @param RequestParameters $params Request parameters
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*** @return string Body of the reCAPTCHA response
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
    public function submit(RequestParameters $params)
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
        $handle = $this->curl->init($this->siteVerifyUrl);

        $options = array(
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params->toQueryString(),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            CURLINFO_HEADER_OUT => false,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true
        );
        $this->curl->setoptArray($handle, $options);

        $response = $this->curl->exec($handle);
        $this->curl->close($handle);

        if ($response !== false)***REMOVED*****REMOVED***
            return $response;
***REMOVED***

        return '***REMOVED***"success": false, "error-codes": ["'.ReCaptcha::E_CONNECTION_FAILED.'"]***REMOVED***';
***REMOVED*****REMOVED*****REMOVED*****REMOVED*****REMOVED***
***REMOVED***
