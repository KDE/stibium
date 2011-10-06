/**
 * Copyright (C) 2011 KO GmbH <jos.van.den.oever@kogmbh.com>
 * @licstart
 * The JavaScript code in this page is free software: you can redistribute it
 * and/or modify it under the terms of the GNU Affero General Public License
 * (GNU AGPL) as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.  The code is distributed
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU AGPL for more details.
 *
 * As additional permission under GNU AGPL version 3 section 7, you
 * may distribute non-source (e.g., minimized or compacted) forms of
 * that code without the copy of the GNU GPL normally required by
 * section 4, provided you include this license notice and a URL
 * through which recipients can access the Corresponding Source.
 *
 * As a special exception to the AGPL, any HTML file which merely makes function
 * calls to this code, and for that purpose includes it by reference shall be
 * deemed a separate work for copyright law purposes. In addition, the copyright
 * holders of this code give you permission to combine this code with free
 * software libraries that are released under the GNU LGPL. You may copy and
 * distribute such a system following the terms of the GNU AGPL for this code
 * and the LGPL for the libraries. If you modify this code, you may extend this
 * exception to your version of the code, but you are not obligated to do so.
 * If you do not wish to do so, delete this exception statement from your
 * version.
 *
 * This license applies to this entire compilation.
 * @licend
 * @source: http://www.webodf.org/
 * @source: http://gitorious.org/odfkit/webodf/
 */
/*global runtime core*/
runtime.loadClass("core.JSLint");

function checkWithJSLINT(file) {
    var i, jslint = new core.JSLint().JSLINT,
        jslintconfig = {
            bitwise: true,
            newcap: true,
            nomen: true,
            onevar: true,
            passfail: false,
            plusplus: true,
            regexp: true,
            undef: true,
        //    white: true,
            indent: 4,
            maxerr: 50
         //   maxlen: 80
        },
        data, result, err;

    // these files are an exception for now
    if (file === "lib/core/RawDeflate.js" ||
            file === "lib/core/RawInflate.js") {
        return;
    }
        
    data = runtime.readFileSync(file, "utf-8");
    result = jslint(data, jslintconfig);
    if (!result) {
        for (i = 0; i < jslint.errors.length && jslint.errors[i]; i += 1) {
            err = jslint.errors[i];
            runtime.log(file + ":" + err.line + ":" + err.character +
                ": error: " + err.reason);
        }
        runtime.exit(1);
    }
}

var i;
for (i = 0; i < arguments.length; i += 1) {
    checkWithJSLINT(arguments[i]);
}
