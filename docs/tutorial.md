#Curso Wordpress - Parte II
Esta é a continuação do curso de wordpress



##Ementa

Os temas abordados nessa parte são:

- Single.php
- Page.php
- Custom templates
- Theme Custom resources
- Custon post types
- Advanced Custom Fields - plugin

##single.php

O single.php é responsavel por exibir a pagina do post, ao contrario da index reponsavel pela listagem, onde é exibido uma resumo do post, o single deve exibir o conteudo completo, para isso basta uma pequena modificação no loop do index.php
ao invez de usarmos o *get_the_excerpt()*
```
	$resumo = get_the_excerpt();
	echo '<p>'.$resumo.'</p>';
```
Usaremos o *get_the_content()* para obtermos o conteudo completo do post, inclusive com as tags htmls, sem a necessidade de empacotalos em uma tag como no index.php.
```
	$content = get_the_content();
	echo $content;
```
O codigo completo fica assim:
```
<?php

get_header();
echo "<!-- single.php -->";
?>

<div id="main" class="wrapper style1">
	<div class="container">
		<section>
			<header class="major">
				<h2><?php wp_title(''); ?></h2>
			</header>
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					
					<?php
					$content = get_the_content();
					echo $content;
					?>
					
				<?php endwhile;
			else :
				echo '<p> No content found</p>';
			endif;
			?>
		</section>
	</div>
</div>

<?php
get_footer();
?>
```
####Extras
[Post Template Files](https://developer.wordpress.org/themes/template-files-section/post-template-files/) 

##page.php
O page.php tem a mesma estrutura do single.php, só que é utilizado para renderizar a paginas e não os posts.
Apesar de usarmos o loop com os interadores post, o conteudo obtido será o das paginas.
```
<?php
get_header();
echo "<!-- page.php -->";
?>


<div id="main" class="wrapper style1">
	<div class="container">
		<section>
			<header class="major">
				<h2><?php the_title(); ?></h2>
			</header>
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
				
					<?php
					$content = get_the_content();
					echo $content;
					?>
				<?php endwhile;
			else :
				echo '<p> No content found</p>';
			endif;
			?>
		</section>
	</div>
</div>


<?php
get_footer();
?>
```

>Também é possivel substituir o single.php e o page.php pelo singular.php, quando o single e o page utilizam o mesmo template.

####Extras
[Page Templates](https://developer.wordpress.org/themes/template-files-section/page-template-files/) 

##Custom templates
Custom templates são templates customizados, onde pode se selecionar um template na pagina de edição, é util quando queremos definir um template que será utilizado poucas vezes em algumas paginas.
Ao criar um Custom template é necessario definir o seu nome, em um comentario de preferencia no inicio do arquivo.
```
<?php
/* Template Name: Nome do template */
```
Apartir de então é possivel criar a pagina customizada:

		 
	 <?php
	/* Template Name: Nome do template */
	get_header();
	echo "<!-- nome-do-template.php -->";
	
	?>
	
	<div id="main" class="wrapper style1">
		<div class="container">
			<section>
				<header class="major">
					<h2>Titulo</h2>
					<span class="byline">subtitulo</span>
				</header>
				
				<p>
					Teplate personalizado
				</p>
			</section>
		</div>
	</div>
	
	<?php
	get_footer();
	?>
	
Podemos realizar modificações como em um documento html, e realizar chamadas php.

####Extras
[Creating Custom Page Templates for Global Use](https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use) 

## Theme Custom resources
Os Theme Custom resources são recursos do tema que podem ser modificados pela pagina de administração do tema.
É possivel adicionar campos de formularios na parte de customização do tema e recuperar os valores apatir no codigo do tema.

Para adicionar uma configuração na pagina de configuração do tema é necessario criar paineis que iram agrupar as seções, que iram agrupar configurações, que finalmente iram agrupar os controles.
Os controles podem ser desde campos de formularios, até upload de arquivos e media como fotos e videos, ideais para adicionar uma imagem de background ou um video institucional a front-page do site.

primeiramente vamos regristrar a função de customização.
```
add_action( 'customize_register', 'genesischild_register_theme_customizer' );
```
O *genesischild_register_theme_customizer* é o nome da função responsavel por adicionar os paineis, seções, configurações e controles.
Essa função deve receber um objeto chamado *$wp_customize* que é responsavel por renderizar o menu de customização, apartir de seus metodos iremos adicionar nossas proprias opções ao menu, mas também é possivel modificar as existentes.
```
function genesischild_register_theme_customizer( $wp_customize ) {
```
Para **adicionar um painel** utilizaremos o metodo *add_panel* do *$wp_customize*
```
	$wp_customize->add_panel( 'id_panel', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Titulo do painel', 'genesischild' ),
		'description'    => __( 'Descrição do painel.', 'genesischild' ),
	) );

```
Esse painel estará em aparencia -> personalizar -> Titulo do painel
Agora iremos **adicionar uma seção** ao painel.
```
	$wp_customize->add_section( 'id_section' , array(
		'title'    => __('Titulo da seção','genesischild'),
		'panel'    => 'id_panel',
		'priority' => 10
	) );
```
No campo **panel** é colocado o id do painel que essa seção pertence
Agora **Adicionaremos uma configuração**.
```
$wp_customize->add_setting('id_setting', array(
        'default'        => 'Nulla luctus eleifend',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
));
```
O valor *default* é o valor padrão da configuração.
Agora **adicionaremos um controle** para que possamos modificar a configuração.
```
$wp_customize->add_control('id_control', array(
	'label'      => __('Title', 'mcs'),
	'section'    => 'id_section',
	'settings'   => 'id_setting',
));
```

Agora que podemos setar configurações do tema diretamente da pagina de configuração, como recuperamos essa configuração?
Através da função *get_theme_mod(id_setting)*

```
<h2><?php echo get_theme_mod('id_setting');?></h2>
```

Já que sabemos como gerar as configurações e obter os valores, vou dar uma dica, existe um gerador de Custom Theme Resources disponivel clicando [aqui](https://dev.lws-webdesign.de/generator/customizer-v3/), basta adicionar as configurações, que ele gera o codigo para você colar e copiar.

####Extras
[WP Customizer Generator](https://dev.lws-webdesign.de/generator/customizer-v3/) 
[The WordPress Customizer – A Developers Guide (Part 1)](https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-1/) 
[Adding a Text Block via the Customizer in WordPress](https://wpbeaches.com/adding-text-block-via-customizer-wordpress/) 
[Customizer Objects](https://developer.wordpress.org/themes/customize-api/customizer-objects/) 


## Custon post types
Os Custon post types são um recurso bem interessante do wordpress, ele permite a criação de outros tipos de posts que podem ser customizados com custon fields, fora isso ele é bem simples, sem o recurso de custon fields ele é até mais limitado que os posts convencionais.
Normalmente definimos post-types em plugins, assim quando modificamos o tema, não perdemos as informações dos posts já publicados, mas é possivel definir post-types no *functions.php* de um tema.
Para registrar um post-type você deve usar a função *register_post_type('post_name', $args)*.onde $args guarda todas as variaveis de configuração do post.
É necessario chamar *register_post_type* dentro da função de registro do post-type onde é chamada por uma ação do wordpress.

Para adicionarmos um post-type, adicionaremos uma ação, para adicionar o post-type quando o wordpress for 'iniciado'.
```
add_action( 'init', 'custom_post_post_type' );
```
O *custom_post_post-type* é o nome da função que irá adicionar o post-type e todos os seus parametros.
```
function custom_post_post_type() {
```
Agora iremos definir os labels do post-type, as strings que iram aparecer na tela de administração do wordpress ao adicionar-mos um novo post, excluir, etc.
```
  $labels = array(
    'name'               => __( 'post-types' ),
    'singular_name'      => __( 'post-type' ),
    'add_new'            => __( 'Add New post-type' ),
    'add_new_item'       => __( 'Add New post-type' ),
    'edit_item'          => __( 'Edit post-type' ),
    'new_item'           => __( 'New post-type' ),
    'all_items'          => __( 'All post-types' ),
    'view_item'          => __( 'View post-type' ),
    'search_items'       => __( 'Search post-types' ),
    'featured_image'     => 'Poster',
    'set_featured_image' => 'Add Poster'
  );
```
Agora iremos definir os parâmetros do post-type, como a posição do menu, a descrição, se é publico, quais recursos o post-type irá suportar (não esqueça do custom-fields).
```
  $args = array(
    'labels'            => $labels,
    'description'       => 'post-types',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array(  'title',   'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
    'query_var'         => 'post-type'
  );
```
e agora é só registrar o post-type
```
register_post_type( 'post-type', $args);
```
lembrando que os ultimos três codigos, os labels, parametros, e o registro do post-type devem ser feitos dentro da função.

O codigo final ficou assim:

```
add_action( 'init', 'custom_post_post_type' );

function custom_post_post_type() {
 
  $labels = array(
    'name'               => __( 'post-type' ),
    'singular_name'      => __( 'post-type' ),
    'add_new'            => __( 'Add New post-type' ),
    'add_new_item'       => __( 'Add New post-type' ),
    'edit_item'          => __( 'Edit post-type' ),
    'new_item'           => __( 'New post-type' ),
    'all_items'          => __( 'All post-types' ),
    'view_item'          => __( 'View post-type' ),
    'search_items'       => __( 'Search post-types' ),
    'featured_image'     => 'Poster',
    'set_featured_image' => 'Add Poster'
  );
 
  $args = array(
    'labels'            => $labels,
    'description'       => 'post-types',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array(  'title',   'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
    'query_var'         => 'post-type'
  );
 
  register_post_type( 'post-type', $args);
}

```
####Extras
[Generator post-type](https://generatewp.com/post-type/) 
[Custom Post Types: Como Criar Posts Personalizados no WordPress](https://www.hostinger.com.br/tutoriais/como-criar-custom-post-types-wordpress/) 
[Custom Post Types - Documentação Oficial](https://wordpress.org/support/article/post-types/#custom-post-types) 
[Custom Post Types no WordPress - Tableless](https://tableless.com.br/custom-post-types-wordpress/) 
[How to Add Icons for Custom Post Types in WordPress](https://www.wpbeginner.com/wp-tutorials/how-to-add-icons-for-custom-post-types-in-wordpress/) 

##Advanced Custom Fields
O ACF é um plugin que adiciona campos personalizado a post-types, tornando os post-types um recurso bem mais util, dentre os campos há anexo de imagens, e arquivos, datas, texto, links, e é possivel fazer campos com personalização condicional, se o campo x está marcado, exibir campos a, b e c. 
Por exemplo, caso tenhamos um campo cargo, e dentre as opções tivermos professor, é possivel exibir um campo lattes para adicionar o curriculo do professor, apenas se o campo cargo for igual a professor, e definido campos personalizados de acordo com os cargos.
Para usar os campos personalidos, vc deve instalar o plug-in no wordpress e ativa-lo, ao fazer isso uma opção chamada **Campos Personalizados** irá está disponivel no menu de administração, ao clicar nela,

####Extras

[documentação](https://www.advancedcustomfields.com/resources/)

