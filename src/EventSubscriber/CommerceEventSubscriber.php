<?php

namespace Drupal\commerce_example3\EventSubscriber;

use Drupal\commerce_product\Event\ProductEvents;
use Drupal\commerce_product\Event\ProductVariationAjaxChangeEvent;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class CommerceEventSubscriber.
 *
 * @package Drupal\commerce_example3\EventSubscriber
 */
class CommerceEventSubscriber implements EventSubscriberInterface {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   *
   * @return array
   *   The events to subscribe to and the methods they should execute.
   */
  public static function getSubscribedEvents() {
    return [
      ProductEvents::PRODUCT_VARIATION_AJAX_CHANGE => 'addAjaxAlert',
    ];
  }

  /**
   * React to a new product variation being selected on the Add to Cart form.
   *
   * @param \Drupal\commerce_product\Event\ProductVariationAjaxChangeEvent $event
   *   The product variation Ajax change event object.
   */
  public function addAjaxAlert(ProductVariationAjaxChangeEvent $event) {
    // Pull the variation ID out of the event.
    $variation_id = $event->getProductVariation()->id();

    // Prepare our alert message.
    $message = $this->t('Switching to product variation @id.', ['@id' => $variation_id]);

    // Add our Ajax command to the response array.
    $event->getResponse()->addCommand(new AlertCommand($message));
  }

}
