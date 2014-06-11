<?php

/**
 * @file
 * Contains \Drupal\ultimate_cron\LauncherManager.
 */

namespace Drupal\ultimate_cron;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Language\LanguageManager;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * A plugin manager for launcher plugins.
 */
class LauncherManager extends DefaultPluginManager {

  /**
   * Constructs a LauncherManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Language\LanguageManager $language_manager
   *   The language manager.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, LanguageManager $language_manager, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/ultimate_cron/Launcher', $namespaces, $module_handler, 'Drupal\ultimate_cron\Annotation\LauncherPlugin');
    $this->alterInfo('ultimate_cron_launcher_info');
    $this->setCacheBackend($cache_backend, $language_manager, 'ultimate_cron_launcher');
  }

}