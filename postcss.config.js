module.exports = {
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    {
      postcssPlugin: 'postcss-ide-warning-fixer',
      Once(root) {
        root.walkRules(rule => {
          // 1. Fix -webkit-appearance warnings by adding standard appearance property
          let hasWebkitAppearance = false;
          let hasStandardAppearance = false;
          let webkitAppearanceDecl = null;
          
          rule.walkDecls('appearance', () => {
            hasStandardAppearance = true;
          });
          rule.walkDecls('-webkit-appearance', decl => {
            hasWebkitAppearance = true;
            webkitAppearanceDecl = decl;
          });
          
          if (hasWebkitAppearance && !hasStandardAppearance && webkitAppearanceDecl) {
            rule.insertAfter(webkitAppearanceDecl, {
              prop: 'appearance',
              value: webkitAppearanceDecl.value
            });
          }
          
          // 2. Fix line-clamp warnings by adding standard line-clamp property
          let hasWebkitLineClamp = false;
          let hasStandardLineClamp = false;
          let webkitLineClampDecl = null;
          
          rule.walkDecls('line-clamp', () => {
            hasStandardLineClamp = true;
          });
          rule.walkDecls('-webkit-line-clamp', decl => {
            hasWebkitLineClamp = true;
            webkitLineClampDecl = decl;
          });
          
          if (hasWebkitLineClamp && !hasStandardLineClamp && webkitLineClampDecl) {
            rule.insertAfter(webkitLineClampDecl, {
              prop: 'line-clamp',
              value: webkitLineClampDecl.value
            });
          }

          // 3. Fix vertical-align: middle when display: block is set
          let hasDisplayBlock = false;
          let verticalAlignDecl = null;
          
          rule.walkDecls('display', decl => {
            if (decl.value === 'block') {
              hasDisplayBlock = true;
            }
          });
          rule.walkDecls('vertical-align', decl => {
            if (decl.value === 'middle') {
              verticalAlignDecl = decl;
            }
          });
          
          if (hasDisplayBlock && verticalAlignDecl) {
            verticalAlignDecl.remove();
          }
        });
      }
    }
  ]
};
