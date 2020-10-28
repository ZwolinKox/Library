<?php

namespace Library;

class View {

    public static function render(string $path, array $params=[]) {
        $latte = new \Latte\Engine;

        $latte->setTempDirectory('./tmp');

        // render to output
        return $latte->renderToString('./views/'.$path, $params);
    }


}
