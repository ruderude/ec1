<?php

/* columns_definitions/column_auto_increment.twig */
class __TwigTemplate_a7d9e6d7712bacb256d25d37b13291811301b4065574e680dbf706fe15f44d9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<input name=\"field_extra[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    id=\"field_";
        // line 2
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    ";
        // line 3
        if (($this->getAttribute(($context["column_meta"] ?? null), "Extra", [], "array", true, true) && (twig_lower_filter($this->env, $this->getAttribute(($context["column_meta"] ?? null), "Extra", [], "array")) == "auto_increment"))) {
            // line 4
            echo "checked=\"checked\"";
        }
        // line 6
        echo "    type=\"checkbox\"
    value=\"AUTO_INCREMENT\" />
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_auto_increment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  32 => 4,  30 => 3,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/column_auto_increment.twig", "/home/vagrant/code/ec/ec1/public/phpMyAdmin/templates/columns_definitions/column_auto_increment.twig");
    }
}
