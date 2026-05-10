<?php
/**
* Třída Router slouží k definování a zpracování směrování HTTP požadavků v aplikaci.
* Umožňuje definovat různé cesty (routes) pro různé HTTP metody (GET, POST) a přiřadit jim odpovídající callback funkce, které se vykonají při obdržení požadavku na danou cestu.
* Tato třída zjednodušuje správu směrování v aplikaci a umožňuje snadno přidávat nové cesty a logiku pro zpracování požadavků.
*/
class Router
{
    private array $routes = [];

    /**
    * Definuje cestu pro HTTP GET požadavek. Ukládá cestu a odpovídající callback funkci do pole $routes.
    *
    * @param string $path Cesta, na kterou se má reagovat (např. '/seasons').
    * @param callable $callback Funkce, která se vykoná při obdržení GET požadavku na danou cestu.
    */  
    public function get(string $path, callable $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    /**
    * Definuje cestu pro HTTP POST požadavek. Ukládá cestu a odpovídající callback funkci do pole $routes.
    *
    * @param string $path Cesta, na kterou se má reagovat (např. '/drivers').
    * @param callable $callback Funkce, která se vykoná při obdržení POST požadavku na danou cestu.
    */
    public function post(string $path, callable $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    /**
        * Zpracuje HTTP požadavek na základě jeho URI a metody.
        *
        * @param string $uri URI požadavku.
        * @param string $method HTTP metoda požadavku.
        */
    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            call_user_func($this->routes[$method][$path]);
            return;
        }

        http_response_code(404);
        echo 'Stránka nenalezena';
    }
}
