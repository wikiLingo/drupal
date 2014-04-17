<?php

class wikiLingoEventsCustom
{
  public function wikiLingoEventsCustom(WikiLingo\Events &$events)
  {
    $events
        ->bind(new WikiLingo\Event\Expression\Variable\Context(function() {


        }));
  }
}