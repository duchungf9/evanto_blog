<?php

function ux_builder( $name = null ) {
  return \UxBuilder\Application::get_instance()->resolve( $name );
}

require_once __DIR__ . '/breakpoints.php';
require_once __DIR__ . '/components.php';
require_once __DIR__ . '/elements.php';
require_once __DIR__ . '/misc.php';
require_once __DIR__ . '/modules.php';
require_once __DIR__ . '/options.php';
require_once __DIR__ . '/page.php';
require_once __DIR__ . '/paths.php';
require_once __DIR__ . '/posts.php';
require_once __DIR__ . '/states.php';
require_once __DIR__ . '/strings.php';
require_once __DIR__ . '/templates.php';
require_once __DIR__ . '/templating.php';
require_once __DIR__ . '/transformers.php';
require_once __DIR__ . '/urls.php';
