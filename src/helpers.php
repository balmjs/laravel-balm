<?php

if (! function_exists('balm')) {
    /**
     * Get the path to a versioned Balm file.
     *
     * @param  string  $file
     * @param  string  $subDirectory
     * @param  string  $buildDirectory
     * @return string
     */
    function balm($file, $subDirectory = '', $buildDirectory = 'build')
    {
        static $manifest = [];
        static $manifestPath;

        $hasSubDirectory = !empty($subDirectory);

        if (empty($manifest) || $manifestPath !== $buildDirectory) {
            $path = $hasSubDirectory
                ? public_path($subDirectory.'/'.$buildDirectory.'/rev-manifest.json')
                : public_path($buildDirectory.'/rev-manifest.json');

            if (file_exists($path)) {
                $manifest = json_decode(file_get_contents($path), true);
                $manifestPath = $buildDirectory;
            }
        }

        $file = ltrim($file, '/');

        if (isset($manifest[$file])) {
            return $hasSubDirectory
                ? '/'.$subDirectory.'/'.trim($buildDirectory.'/'.$manifest[$file], '/')
                : '/'.trim($buildDirectory.'/'.$manifest[$file], '/');
        }

        $unversioned = $hasSubDirectory
            ? public_path($subDirectory.'/'.$file)
            : public_path($file);

        if (file_exists($unversioned)) {
            return $hasSubDirectory
                ? '/'.$subDirectory.'/'.trim($file, '/')
                : '/'.trim($file, '/');
        }
    }
}
