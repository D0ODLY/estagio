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

/* themes/market_wave/templates/form/form-element.html.twig */
class __TwigTemplate_4e2b7cc3b2039a1ab9e2759e1239e014 extends Template
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
        // line 47
        echo "
";
        // line 49
        $context["label_attributes"] = ((($context["label_attributes"] ?? null)) ? (($context["label_attributes"] ?? null)) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 51
        echo "
";
        // line 53
        $context["classes"] = ["form-item", ("form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 55
($context["type"] ?? null), 55, $this->source))), ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 56
($context["name"] ?? null), 56, $this->source))), ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 57
($context["name"] ?? null), 57, $this->source))), ((!twig_in_filter(        // line 58
($context["title_display"] ?? null), ["after", "before"])) ? ("form-no-label") : ("")), (((        // line 59
($context["disabled"] ?? null) == "disabled")) ? ("disabled") : ("")), ((        // line 60
($context["errors"] ?? null)) ? ("has-error") : (""))];
        // line 63
        echo "
";
        // line 64
        if ((($context["title_display"] ?? null) == "invisible")) {
            // line 65
            echo "  ";
            if (array_key_exists("labelclass", $context)) {
                // line 66
                echo "    ";
                $context["labelclass"] = ($this->sandbox->ensureToStringAllowed(($context["labelclass"] ?? null), 66, $this->source) . " visually-hidden");
                // line 67
                echo "  ";
            } else {
                // line 68
                echo "    ";
                $context["labelclass"] = "visually-hidden";
                // line 69
                echo "  ";
            }
        }
        // line 71
        echo "
";
        // line 73
        $context["description_classes"] = ["description", "text-muted", (((        // line 76
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 79
        if (twig_in_filter(($context["type"] ?? null), ["checkbox", "radio"])) {
            // line 80
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 80), 80, $this->source), "html", null, true);
            echo ">
    ";
            // line 81
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 82
                echo "      <span class=\"field-prefix\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 82, $this->source), "html", null, true);
                echo "</span>
    ";
            }
            // line 84
            echo "
    ";
            // line 85
            if (((($context["description_display"] ?? null) == "before") && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 85))) {
                // line 86
                echo "      <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 86), 86, $this->source), "html", null, true);
                echo ">
        ";
                // line 87
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 90
            echo "
    ";
            // line 91
            if (twig_in_filter(($context["label_display"] ?? null), ["before", "invisible"])) {
                // line 92
                echo "      <label ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["label_attributes"] ?? null), "addClass", [($context["labelclass"] ?? null)], "method", false, false, true, 92), "setAttribute", ["for", twig_get_attribute($this->env, $this->source, ($context["input_attributes"] ?? null), "id", [], "any", false, false, true, 92)], "method", false, false, true, 92), 92, $this->source), "html", null, true);
                echo ">
        ";
                // line 93
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null), 93, $this->source));
                echo "
        <input";
                // line 94
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["input_attributes"] ?? null), "addClass", [($context["inputclass"] ?? null)], "method", false, false, true, 94), 94, $this->source), "html", null, true);
                echo "></input>
        <span class=\"checkmark\"></span>
      </label>
    ";
            }
            // line 98
            echo "
    ";
            // line 99
            if ((($context["checkbox_style"] ?? null) == "form-button")) {
                // line 100
                echo "      <input";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["input_attributes"] ?? null), "addClass", [($context["inputclass"] ?? null)], "method", false, false, true, 100), "setAttribute", ["autocomplete", "off"], "method", false, false, true, 100), 100, $this->source), "html", null, true);
                echo ">
      <span class=\"checkmark\"></span>
    ";
            }
            // line 103
            echo "
    ";
            // line 104
            if ((($context["label_display"] ?? null) == "after")) {
                // line 105
                echo "      <label ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["label_attributes"] ?? null), "addClass", [($context["labelclass"] ?? null)], "method", false, false, true, 105), "setAttribute", ["for", twig_get_attribute($this->env, $this->source, ($context["input_attributes"] ?? null), "id", [], "any", false, false, true, 105)], "method", false, false, true, 105), 105, $this->source), "html", null, true);
                echo ">
        <input";
                // line 106
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["input_attributes"] ?? null), "addClass", [($context["inputclass"] ?? null)], "method", false, false, true, 106), 106, $this->source), "html", null, true);
                echo ">
        <span class=\"checkmark\"></span>
        ";
                // line 108
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null), 108, $this->source));
                echo "
      </label>
    ";
            }
            // line 111
            echo "
    ";
            // line 112
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 113
                echo "      <span class=\"field-suffix\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 113, $this->source), "html", null, true);
                echo "</span>
    ";
            }
            // line 115
            echo "
    ";
            // line 116
            if (($context["errors"] ?? null)) {
                // line 117
                echo "      <div class=\"invalid-feedback form-item--error-message\">
        ";
                // line 118
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 118, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 121
            echo "
    ";
            // line 122
            if ((twig_in_filter(($context["description_display"] ?? null), ["after", "invisible"]) && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 122))) {
                // line 123
                echo "      <small";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 123), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 123), 123, $this->source), "html", null, true);
                echo ">
        ";
                // line 124
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 124), 124, $this->source), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 127
            echo "
  </div>

";
        } else {
            // line 131
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 131), 131, $this->source), "html", null, true);
            echo ">
    ";
            // line 132
            if (twig_in_filter(($context["label_display"] ?? null), ["before", "invisible"])) {
                // line 133
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 133, $this->source), "html", null, true);
                echo "
    ";
            }
            // line 135
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 136
                echo "      <div class=\"input-group";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["errors"] ?? null)) ? (" is-invalid") : ("")));
                echo "\">
    ";
            }
            // line 138
            echo "    ";
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 139
                echo "      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">";
                // line 140
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 140, $this->source), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 143
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 143))) {
                // line 144
                echo "      <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 144), 144, $this->source), "html", null, true);
                echo ">
        ";
                // line 145
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 145), 145, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 148
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 148, $this->source), "html", null, true);
            echo "
    ";
            // line 149
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 150
                echo "      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">";
                // line 151
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 151, $this->source), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 154
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 155
                echo "      </div>
    ";
            }
            // line 157
            echo "    ";
            if ((($context["label_display"] ?? null) == "after")) {
                // line 158
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 158, $this->source), "html", null, true);
                echo "
    ";
            }
            // line 160
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 161
                echo "      <div class=\"invalid-feedback form-item--error-message\">
        ";
                // line 162
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 162, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 165
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), ["after", "invisible"]) && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 165))) {
                // line 166
                echo "      <small";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 166), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 166), 166, $this->source), "html", null, true);
                echo ">
        ";
                // line 167
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 167), 167, $this->source), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 170
            echo "  </div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["type", "name", "title_display", "disabled", "errors", "labelclass", "description_display", "attributes", "prefix", "description", "label_display", "input_attributes", "input_title", "inputclass", "checkbox_style", "suffix", "label", "children"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/market_wave/templates/form/form-element.html.twig";
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
        return array (  320 => 170,  314 => 167,  309 => 166,  306 => 165,  300 => 162,  297 => 161,  294 => 160,  288 => 158,  285 => 157,  281 => 155,  278 => 154,  272 => 151,  269 => 150,  267 => 149,  262 => 148,  256 => 145,  251 => 144,  248 => 143,  242 => 140,  239 => 139,  236 => 138,  230 => 136,  227 => 135,  221 => 133,  219 => 132,  214 => 131,  208 => 127,  202 => 124,  197 => 123,  195 => 122,  192 => 121,  186 => 118,  183 => 117,  181 => 116,  178 => 115,  172 => 113,  170 => 112,  167 => 111,  161 => 108,  156 => 106,  151 => 105,  149 => 104,  146 => 103,  139 => 100,  137 => 99,  134 => 98,  127 => 94,  123 => 93,  118 => 92,  116 => 91,  113 => 90,  107 => 87,  102 => 86,  100 => 85,  97 => 84,  91 => 82,  89 => 81,  84 => 80,  82 => 79,  80 => 76,  79 => 73,  76 => 71,  72 => 69,  69 => 68,  66 => 67,  63 => 66,  60 => 65,  58 => 64,  55 => 63,  53 => 60,  52 => 59,  51 => 58,  50 => 57,  49 => 56,  48 => 55,  47 => 53,  44 => 51,  42 => 49,  39 => 47,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/market_wave/templates/form/form-element.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/mywebsite/themes/market_wave/templates/form/form-element.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 49, "if" => 64);
        static $filters = array("clean_class" => 55, "escape" => 80, "raw" => 93);
        static $functions = array("create_attribute" => 49);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'raw'],
                ['create_attribute']
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
