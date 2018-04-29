<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImage extends Controller {
	public function uploadThumb( Request $request ) {
		$data = $request->all();
		if ( $data['thumb'] ) {
			$extension        = $data['thumb']->getClientOriginalExtension();
			$imageName        = str_slug( substr( $data['thumb']->getClientOriginalName(), 0, - 4 ) );
			$newImageName     = $imageName . '-' . rand( 11111, 99999 ) . '.' . $extension;
			$path             = 'uploads/';
			$upload_success   = $data['thumb']->move( $path, $newImageName );
			$newImageNameTest = $newImageName;
			if ( $upload_success ) {
				return response()->json( [
					'success'   => true,
					'message'   => 'Successfully...',
					'image'     => asset( $path.$newImageName ),
					'imageName' => $newImageNameTest
				] );
			} else {
				return response()->json( [
					'success' => false,
					'message' => 'Error'
				] );
			}
		}
	}
}
