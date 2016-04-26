# thumbnails-en-componentes
Creación thumbnails en un componente Joomla 3.5

Cree un componente en component-creator.com pero necesitaba generar imagenes miniatura de los productos que se almacenaban en el componente.

En mi base de datos tengo 2 tipos de imagenes, una que es un grupo de imagenes principales y una que es una imagen para los listados

       <fields name="images" label="COM_CONTENT_FIELD_IMAGE_OPTIONS">
            <field
                name="image_1"
                type="media"
                label="Imagen 1"
                description="" />

            <field
                name="image_2"
                type="media"
                label="Imagen 2"
                description="" />

            <field
                name="image_3"
                type="media"
                label="Imagen 3"
                description="" />

            <field
                name="image_4"
                type="media"
                label="Imagen 4"
                description="" />

            <field
                name="image_5"
                type="media"
                label="Imagen 5"
                description="" />

        </fields>
        
Este tipo de campo genera un array con todos los subcampos indicados, en este caso me genera un array con 5 imagenes, aunque en el codigo del model solo guardo en el array los que si tengan una imagen asignada.

El otro tipo de imagen para los listados es normal, con el campo de tipo media.



