(function($) {
    /* is this stuff defined? it should be by default */
    if (!document.ELEMENT_NODE) {
        document.ELEMENT_NODE = 1;
        document.ATTRIBUTE_NODE = 2;
        document.TEXT_NODE = 3;
        document.CDATA_SECTION_NODE = 4;
        document.ENTITY_REFERENCE_NODE = 5;
        document.ENTITY_NODE = 6;
        document.PROCESSING_INSTRUCTION_NODE = 7;
        document.COMMENT_NODE = 8;
        document.DOCUMENT_NODE = 9;
        document.DOCUMENT_TYPE_NODE = 10;
        document.DOCUMENT_FRAGMENT_NODE = 11;
        document.NOTATION_NODE = 12;
    }
/*
 * Ways to call
 * 
 * $('').appendImport(xmlnode, options);
 * $('').appendImport(jquery, options);
 * 
 */

    jQuery.fn.appendImport = function(xml, options) {
        // set option defaults
        options = setOptions(options);
        // convert DOM Element(s) to jQuery object
        xml = xml.jquery ? xml : $(xml);

        return this.each(function() {
            // set document owner to import into
            owner = this.ownerDocument || document;
            // save 'this' from being overwritten by inner 'each'
            var parentElement = this;
            xml.each(function(){
                var newNode = importNode(owner, this, options)
                parentElement.appendChild(newNode);
                /* invoke the HTML processor in IE to ensure events and styles are applied */
                if (!document.importNode && parentElement.innerHTML) {
                    parentElement.innerHTML = parentElement.innerHTML;
                }
            });
        });
    };

    jQuery.fn.appendImportTo = function(xml, options) {
        // set option defaults
        options = setOptions(options);
        // convert DOM Element(s) to jQuery object
        xml = xml.jquery ? xml : $(xml);

        // save 'this' from being overwritten by outer 'each'
        var toImport = this;

        xml.each(function() {
            // save 'this' from being overwritten by outer 'each'
            var parentElement = this;
            // set document owner to import into
            owner = this.ownerDocument || document;
            toImport.each(function(){
                parentElement.appendChild(importNode(owner, this, options));
                /* invoke the HTML processor in IE to ensure events and styles are applied */
                if (!document.importNode && parentElement.innerHTML) {
                    parentElement.innerHTML = parentElement.innerHTML;
                }
            });
        });
        return this;
    };

    function setOptions(options){
        // set option defaults
        return jQuery.extend({
	        children: true,// append subtree
	        attributes: true,// append attributes
            text: true,
            cdata: true,
            comment: true,
            entity_ref: true,
            entity: true,
            pi: true,
            doc: true,
            doctype: true,
            docfrag: true,
            notation: true
        }, options);
    }

    function importNode(owner, node, options){
        /* find the node type to import */
        switch (node.nodeType) {
            case document.ELEMENT_NODE:
                /* create a new element */
                var newNode = owner.createElement(node.nodeName);
                /* does the node have any attributes to add? */
                if (options.attributes && node.attributes && node.attributes.length > 0) {
                    /* add all of the attributes */
                    for (var i = 0, il = node.attributes.length; i < il;) {
                        newNode.setAttribute(node.attributes[i].nodeName, node.getAttribute(node.attributes[i++].nodeName));
                    }
                }
                /* are we going after children too, and does the node have any? */
                if (options.children && node.childNodes && node.childNodes.length > 0) {
                    /* recursively get all of the child nodes */
                    for (var i = 0, il = node.childNodes.length; i < il;) {
                        newNode.appendChild(importNode(owner, node.childNodes[i++], options));
                    }
                }
                return newNode;
                break;
            case document.ATTRIBUTE_NODE:
                // handled in ELEMENT_NODE
                break;
            case document.TEXT_NODE:
            case document.CDATA_SECTION_NODE:
                // CHECK
            case document.COMMENT_NODE:
                // CHECK
                return owner.createTextNode(node.nodeValue);
                break;
            case document.ENTITY_REFERENCE_NODE:
                // TODO
            case document.ENTITY_NODE:
                // TODO
            case document.PROCESSING_INSTRUCTION_NODE:
                // TODO
            case document.DOCUMENT_NODE:
                // TODO
            case document.DOCUMENT_TYPE_NODE:
                // TODO
            case document.DOCUMENT_FRAGMENT_NODE: 
                // TODO
            case document.NOTATION_NODE:
                // TODO
                break;
        }
    }
})(jQuery);