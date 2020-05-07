# ACF Gutenberg Block 

This code helps you in the development of custom Gutenberg blocks using ACF.
  
I am using default twenty twenty theme provided by WordPress but you can also use your custom theme for the development of Gtenberg Blocks.
 
## Files You need to look before we started 🚪
There are two files neccessary to create custom gutenberg block. first is functions.php in which you will write code to register your custom block and second is template file which decides how your block looks like in front end as well as backend.
 
## Getting Started 📋
Open your functions.php file and add following code to register block.
```add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
	}
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}
```
Now, Open your template file and write rendering code inside it. You can check it in following path `/template-parts/block` in my repo.

## Use 🎿
Click on Custom Fields menu item on WordPress dashboard.
Create a new Field group called Testimonial and add below fields
1. Title ( type: text )

2. Name ( type: text )

3. Designation ( type: text )

4. Image ( type: image )

5. Background Colour ( type: color picker )

6. Text Colour ( type: color picker )

7. Alignment ( type: select )

Add a new post and select the block called Testimonial inside formatting category or whatever you've added at the tome of registering block. Add the values from the of the above custom fields using control panel on the right.
Now you will be able to see the content of your block template written in php inside the block. 
You can also add the values of custom field by clicking on the inspector control edit icon, in the block.

Your block will looks like below screenshot after following above steps.

![Screenshot (17)](https://user-images.githubusercontent.com/46484569/77251373-f96e0f80-6c73-11ea-803a-01857f86d0d0.png)

![Screenshot (121)](https://user-images.githubusercontent.com/46484569/77251285-82d11200-6c73-11ea-8317-81c5e361f8d5.png)

Let's see how it look likes in front end. Beautiful !!!! We have created our first custom block using ACF.

![Screenshot (122)](https://user-images.githubusercontent.com/46484569/77251246-56b59100-6c73-11ea-822b-3d193d8385fd.png)
