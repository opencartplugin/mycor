<?php
class ModelLocalisationDistrict extends Model {
		public function getDistricts($province_id) {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			  CURLOPT_URL => 'http://api.rajaongkir.com/starter/city?province=' . $province_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  /*CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",*/
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: 83e1d5b58f19c32190a3e287f9562833"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  return "cURL Error #:" . $err;
			} else {
				return json_decode($response, true);
			}
		}
}