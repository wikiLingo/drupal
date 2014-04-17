<?php

class wikiLingoEventsCustom
{
  public function wikiLingoEventsCustom(WikiLingo\Events &$events)
  {
    $events
        ->bind(new WikiLingo\Event\Expression\Variable\Lookup(function() {


        }))

        ->bind(new WikiLingo\Event\Expression\Plugin\PreRender(function(WikiLingo\Expression\Plugin &$plugin) {
            global $user;

            switch (strtolower($plugin->type)) {
                case "permission":
                    $role = $plugin->parameter("role");
                    if (!empty($role)) {
                        if (in_array($role, $this->roles)) {
                            $plugin->class->permissible = true;
                        }
                    }
            }
        }))

        ->bind(new WikiLingo\Event\Expression\Plugin\PostRender(function(&$rendered, WikiLingo\Expression\Plugin &$plugin) {
            switch (strtolower($plugin->type)) {
                case "permission":
                    $plugin->class->permissible = false;
            }
        }));
  }
}