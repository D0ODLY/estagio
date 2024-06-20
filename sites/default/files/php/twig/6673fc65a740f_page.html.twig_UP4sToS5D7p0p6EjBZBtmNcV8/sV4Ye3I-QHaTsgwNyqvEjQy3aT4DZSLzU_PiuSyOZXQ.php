<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/market_wave/templates/layout/page.html.twig */
class __TwigTemplate_f2713db0420ad91006aefb01d1080ee0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 48
        echo "
<div id=\"page-wrapper\" class=\"page-wrapper\">
    <div id=\"page\">

        ";
        // line 52
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 52) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 52)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 52))) {
            // line 53
            echo "        <header id=\"header\" class=\"site-header\" data-drupal-selector=\"site-header\" role=\"banner\">

            ";
            // line 55
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header", [], "any", false, false, true, 55)) {
                // line 56
                echo "            <div class=\"header_top\">
                <div class=\"container\">
                    ";
                // line 58
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
                echo "
                </div>
            </div>
            ";
            }
            // line 62
            echo "
            ";
            // line 63
            if ((($context["is_front"] ?? null) && ($context["slideshow_display"] ?? null))) {
                // line 64
                echo "                <section class=\"hero-slider hero-style\">
            ";
            }
            // line 66
            echo "                ";
            if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 66) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 66)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 66))) {
                // line 67
                echo "                    <div class=\"container p-0\">
                        <div class=\"navbar navbar-expand-lg\">
                            ";
                // line 69
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
                echo "
                            ";
                // line 70
                if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 70) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 70))) {
                    // line 71
                    echo "                            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\"
                                data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
                                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                                <span class=\"navbar-toggler-icon\"></span>
                            </button>
                            <div class=\"menu-wrapper\">
                                ";
                    // line 77
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
                    echo "
                                ";
                    // line 78
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
                    echo "
                            </div>
                            ";
                }
                // line 81
                echo "                        </div>
                    </div>
                ";
            }
            // line 84
            echo "
                <!-- start of hero -->
                ";
            // line 86
            if ((($context["slideshow_display"] ?? null) && ($context["is_front"] ?? null))) {
                // line 87
                echo "                    <div class=\"swiper-container\">
                    <div class=\"swiper-wrapper\">
                        ";
                // line 89
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["slider_content"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["slider_contents"]) {
                    // line 90
                    echo "                            ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed($context["slider_contents"], 90, $this->source));
                    echo "
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider_contents'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 92
                echo "                    </div>
                
                    <!-- swipper controls -->
                    <div class=\"swiper-pagination\"></div>
                    <div class=\"swiper-button-next\"></div>
                    <div class=\"swiper-button-prev\"></div>
                    </div>
                ";
            }
            // line 100
            echo "            
                ";
            // line 101
            if ((($context["is_front"] ?? null) && ($context["slideshow_display"] ?? null))) {
                // line 102
                echo "                </section>
            ";
            }
            // line 104
            echo "            

        </header>
        ";
        }
        // line 108
        echo "
        <div id=\"main-wrapper\" class=\"layout-main-wrapper layout-container\">
            <div id=\"main\" class=\"layout-main\">
                <div class=\"main-content\">
                    <a id=\"main-content\" tabindex=\"-1\"></a>
                    ";
        // line 113
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "hero", [], "any", false, false, true, 113), 113, $this->source), "html", null, true);
        echo "
                    <div class=\"main-content\">
                        ";
        // line 115
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
        echo "

                        ";
        // line 117
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_above", [], "any", false, false, true, 117)) {
            // line 118
            echo "                        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_above", [], "any", false, false, true, 118), 118, $this->source), "html", null, true);
            echo "
                        ";
        }
        // line 120
        echo "
                        ";
        // line 121
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 121)) {
            // line 122
            echo "                        <div class=\"sidebar-grid grid-full\">
                            <main role=\"main\" class=\"site-main\">
                                ";
            // line 124
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 124), 124, $this->source), "html", null, true);
            echo "
                            </main>

                            ";
            // line 127
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 127), 127, $this->source), "html", null, true);
            echo "
                        </div>
                        ";
        } else {
            // line 130
            echo "                        <main role=\"main\">
                            <div class=\"container\">
                                <div class=\"row\">
                                    ";
            // line 133
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 133), 133, $this->source), "html", null, true);
            echo "
                                </div>
                            </div>
                        </main>
                        ";
        }
        // line 138
        echo "                        ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_below", [], "any", false, false, true, 138), 138, $this->source), "html", null, true);
        echo "
                    </div>
                </div>
                <div class=\"social-bar\">
                    ";
        // line 142
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "social", [], "any", false, false, true, 142), 142, $this->source), "html", null, true);
        echo "
                </div>
            </div>
        </div>

        <footer class=\"site-footer\">
            <div class=\"site-footer container\">
                ";
        // line 149
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 149), 149, $this->source), "html", null, true);
        echo "
                ";
        // line 150
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
        echo "
            </div>
        </footer>

        <div class=\"overlay\" data-drupal-selector=\"overlay\"></div>

    </div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "is_front", "slideshow_display", "slider_content"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/market_wave/templates/layout/page.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  238 => 150,  234 => 149,  224 => 142,  216 => 138,  208 => 133,  203 => 130,  197 => 127,  191 => 124,  187 => 122,  185 => 121,  182 => 120,  176 => 118,  174 => 117,  169 => 115,  164 => 113,  157 => 108,  151 => 104,  147 => 102,  145 => 101,  142 => 100,  132 => 92,  123 => 90,  119 => 89,  115 => 87,  113 => 86,  109 => 84,  104 => 81,  98 => 78,  94 => 77,  86 => 71,  84 => 70,  80 => 69,  76 => 67,  73 => 66,  69 => 64,  67 => 63,  64 => 62,  57 => 58,  53 => 56,  51 => 55,  47 => 53,  45 => 52,  39 => 48,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/market_wave/templates/layout/page.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/mywebsite/themes/market_wave/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 52, "for" => 89);
        static $filters = array("escape" => 58, "raw" => 90);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 'raw'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
