	public function save($data)
	{
		$app          = JFactory::getApplication();
		$generaThumbs = JComponentHelper::getParams('com_catalogo')->get('generaThumbs');
		$ancho        = JComponentHelper::getParams('com_catalogo')->get('anchoThumbs');

		if (isset($data['images']) && is_array($data['images']))
		{

			$images = $data['images'];

			$images_array = array();
			$conteo_images = 1;
			foreach ($images as $img => $im) {
				if ($im){

					$images_array['image_'.$conteo_images] = $im;

					if ($generaThumbs==1):

						$ancho = JComponentHelper::getParams('com_catalogo')->get('anchoThumbs');
						$JImage = new JImage(JPATH_SITE . "/". $im);

						$properties = JImage::getImageFileProperties(JPATH_SITE . "/". $im);
						$resizedImage = $JImage->resize($ancho, $ancho, true);

						$mime = $properties->mime;

						if ($mime == 'image/jpeg')
						{
						    $type = IMAGETYPE_JPEG;
						    $ext  = "jpg";
						}
						elseif ($mime == 'image/png')
						{
						    $type = IMAGETYPE_PNG;
						    $ext  = "png";
						}
						elseif ($mime == 'image/gif')
						{
						    $type = IMAGETYPE_GIF;
						    $ext  = "gif";
						}

						$resizedImage->toFile(JPATH_SITE . "/images/thumbs/".md5($data['id']) . "-" . $conteo_images . "." .$ext, $type);
					endif;

					$conteo_images++;

				}
			}

			$data['images'] = json_encode($images_array);

		}


		// Thumbs campo imagen descripcion
		if (isset($data['imagen_descripcion']) && $data['imagen_descripcion'] != "" ){

			$JImagen = new JImage(JPATH_SITE . "/". $data['imagen_descripcion']);

			$properties = JImage::getImageFileProperties(JPATH_SITE . "/". $data['imagen_descripcion']);
			$resizedImage = $JImagen->resize('200', '200', true);

			$mime = $properties->mime;

			if ($mime == 'image/jpeg')
			{
			    $type = IMAGETYPE_JPEG;
			    $ext  = "jpg";
			}
			elseif ($mime == 'image/png')
			{
			    $type = IMAGETYPE_PNG;
			    $ext  = "png";
			}
			elseif ($mime == 'image/gif')
			{
			    $type = IMAGETYPE_GIF;
			    $ext  = "gif";
			}

			$resizedImage->toFile(JPATH_SITE . "/images/thumbs/".md5($data['id']) . "." .$ext, $type);

		}


		if (parent::save($data))
		{
			return true;
		}
		return false;
	}
