/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
    config.language = 'ru';
    config.uiColor = '#ffffff';
    config.height = 300;
    config.toolbarCanCollapse = true;
    config.removeButtons = 'About';
    config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,button,panelbutton,panel,' +
        'floatpanel,colorbutton,colordialog,templates,menu,contextmenu,copyformatting,div,editorplaceholder,resize,toolbar,' +
        'elementspath,enterkey,entities,exportpdf,popup,filetools,filebrowser,find,fakeobjects,flash,floatingspace,listblock,' +
        'richcombo,font,format,horizontalrule,htmlwriter,iframe,wysiwygarea,indent,indentblock,indentlist,smiley,justify,' +
        'menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,notification,clipboard,pastetext,xml,ajax,pastetools,' +
        'pastefromgdocs,pastefromlibreoffice,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,' +
        'specialchar,scayt,stylescombo,tab,table,tabletools,tableselection,undo,lineutils,widgetselection,widget,notificationaggregator,' +
        'uploadwidget,bootstrapTabs,btgrid,chart,colorinput,computedfont,contents,zoom,youtube,ckawesome,googlesearch,googledocs,' +
        'ckeditor-gwf-plugin,html5video,html5audio,codesnippet,pastefromexcel,video,qrc,image,slideshow,widgettemplatemenu';
    config.allowedContent = true;
    config.filebrowserBrowseUrl = '/laravel-filemanager?type=Files';
    config.filebrowserUploadUrl = '/laravel-filemanager/upload?type=Files&_token=';
    config.filebrowserWindowWidth = '1000';
    config.filebrowserWindowHeight = '700';
};
