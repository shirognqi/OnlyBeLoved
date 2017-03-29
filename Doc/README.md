# 代码规范 - 语义化和结构清晰的平衡点
## 使用正确的文档类型
文档类型声明位于HTML文档的第一行：
<!DOCTYPE html>
如果你想跟其他标签一样使用小写，可以使用以下代码：
<!doctype html>
## 使用小写元素名
## 关闭所有 HTML 元素
## 关闭单标签 
## 使用小写属性名
## 属性值
	HTML5 属性值可以不用引号。
	属性值我们推荐使用引号:
## 空格和等号
	等号前后可以使用空格。
	但我们推荐少用空格:
## 图片属性
	图片通常使用 alt 属性。 在图片不能显示时，它能替代图片显示。
## 避免一行代码过长
	使用 HTML 编辑器，左右滚动代码是不方便的。
	每行代码尽量少于 80 个字符。
## 空行和缩进
	不要无缘无故添加空行。
	为每个逻辑功能块添加空行，这样更易于阅读。
	缩进使用两个空格，不建议使用 TAB。
	比较短的代码间不要使用不必要的空行和缩进。
## 样式表
样式表使用简洁的语法格式 ( type 属性不是必须的):
	<link rel="stylesheet" href="styles.css">
短的规则可以写成一行:
p.into {font-family: Verdana; font-size: 16em;}
长的规则可以写成多行:
	body {
	  background-color: lightgrey;
	  font-family: "Arial Black", Helvetica, sans-serif;
	  font-size: 16em;
	  color: black;
	}
将左花括号与选择器放在同一行。
左花括号与选择器间添加一个空格。
使用两个空格来缩进。
冒号与属性值之间添加已空格。
逗号和符号之后使用一个空格。
每个属性与值结尾都要使用分号。
只有属性值包含空格时才使用引号。
右花括号放在新的一行。

## JavaScript
使用简洁的语法来载入外部的脚本文件 ( type 属性不是必须的 ):
<script src="myscript.js">

## 使用小写文件名
大多 Web 服务器 (Apache, Unix) 对大小写敏感： london.jpg 不能通过 London.jpg 访问。
其他 Web 服务器 (Microsoft, IIS) 对大小写不敏感： london.jpg 可以通过 London.jpg 或 london.jpg 访问。
你必须保持统一的风格，我们建议统一使用小写的文件名。

## 文件扩展名
HTML 文件后缀可以是 .html (或 .htm)。
CSS 文件后缀是 .css 。
JavaScript 文件后缀是 .js 。
.htm 和 .html 的区别
.htm 和 .html 的扩展名文件本质上是没有区别的。浏览器和 Web 服务器都会把它们当作 HTML 文件来处理。
区别在于：
.htm 应用在早期 DOS 系统，系统现在或者只能有三个字符。
在 Unix 系统中后缀没有特别限制，一般用 .html。

## 原始的 HTML4
典型的 HTML4			典型的 HTML5
<div id="header">		<header>
<div id="menu">			<nav>
<div id="content">		<section>
<div id="post">			<article>
<div id="footer">		<footer>
<body>
	<div id="header">
	  <h1>Monday Times</h1>
	</div>

	<div id="menu">
	  <ul>
	    <li>News</li>
	    <li>Weather</li>
	  </ul>
	</div>

	<div id="content">
		<h2>News Section</h2>
		<div id="post">
			<h2>News Article</h2>
			<p>xxxxx</p>
		</div>
	</div>

	<div id="footer">
 		<p>&copy; 2014 Monday Times. All rights reserved.</p>
	</div>
</body>

## 更改为 HTML5 编码
<meta charset="utf-8">

## 更改为 HTML5 Doctype
<!DOCTYPE html>


## 添加 shiv
所有现代浏览器都支持 HTML5 语义元素。
此外，您可以“教授”老式浏览器如何处理“未知元素”。
为 Internet Explorer 支持而添加的 shiv：
	<head>
		<title>Styling HTML5</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
引用 shiv 代码的链接必须位于 <head> 元素中，因为 Internet Explorer 需要在读取之前认识所有新元素。



### figure 元素

比较独立的、被主要内容引用的部分
插图 / 图表 / 照片 / 代码 / ...
通常会有一个标题 (figcaption)
figcaption 元素

图表标题 / 图例 / 代码说明 / ...


## <article> <section> 与 <div> 之间的差异

### 文章1
2）section应用的典型场景有文章的章节、标签对话框中的标签页、或者论文中有编号的部分。一般来说，当元素内容明确地出现在文档大纲中时，section 就是适用的。
3）article标签来说，无论从结构上还是内容上来说，article本身就是独立的、完整的。有个最简单的判断方法是看这段内容脱离了所在的语境，是否还是完整的、独立的，如果是，则应该用article标签。

### 文章2
section元素强调分段或分块，而article强调独立性。
具体来说，如果一块内容相对来说比较独立的、完整的时候，应该使用article元素，但是如果你想将一块内容分成几段的时候，应该使用section元素。

### 文章3   
section：表示文档中的节,一般是具有标题的。如：文档大纲、文章章节、博客条目、用户评论部分或者论文中有编号的部分时使用； 通常会带有标题。如果没有标题，那么就不推荐使用section。      
article：表示独立的自包含内容，如：一篇文章。文章中可包含标题、内容、脚注

### 文章4
article 元素
独立的文档、页面、应用、站点
可以单独发布、重用
可以是...
一篇帖子
一篇文章
一则用户评论
一个可交互的 widget
...


### 文章5
https://www.iandevlin.com/blog/2011/04/html5/html5-section-or-article
HTML5: Section or Article?
§
←Back to listing25 April 2011
One of the main questions I have seen popping up all over the place in relation to HTML5, in forums, StackOverflow, and Twitter, is “which do I use: article or section?”

In fact quite often the answer is “neither, use a div” but these two new elements initially aren’t all that easy to get your head around and because it forces us to think about what we’re writing and the way we present it, we’re thinking in a way we haven’t had to before when laying out a HTML page. And whilst this is a good thing, it does require a bit of thought.


Many HTML5 gurus such as HTML5Doctors Oli Studholme and Bruce Lawson have written about this, and this article adds my own voice and thinking on this one.

Div

The first question you need to ask yourself, is if you simply want to contain information for styling, use a div. The meaning of the div element hasn’t changed in HTML5 from HTML 4.01 and it is often the case that this is what you need. If the elements being enclosed are not related to each other semantically and have no generic heading, then div is your man.

Section

Now that you’ve decided that the content to be enclosed is related, let’s take a look at the section element. The HTML5 specification currently states that:

The section element represents a generic section of a document or application. A section, in this context, is a thematic grouping of content, typically with a heading.
So basically the section element should contain related information grouped under a generic heading.

Estelle Wey creates a good analogy when she talks about a newspaper being split into sections: news, sports and real-estate (well she is American). Each of these has a generic heading and contains information that is related to this heading. Chances are each of these sections will contain articles, which leads us nicely onto…

Article

The article element is specific type of section element in that it:

 represents a self-contained composition in a document, page, application, or site and that is, in principle, independently distributable or reusable, e.g. in syndication.
(HTML5 specification again).

So using the newspaper analogy above, the sports section will contain articles that are about sports, with each individual piece having it’s own heading and story and being entirely self-contained.

The HTML5 specification also likes to point out that:

Authors are encouraged to use the article element instead of the section element when it would make sense to syndicate the contents of the element.
and in this case once again the news article analogy holds true, as newspaper websites RSS feeds will often contain links to each article – which is self-contained.

Nesting

That’s all well and good, but where some more confusion reigns is where you can have an article inside a section which also contains sections itself. This is perfectly legal (in HTML5 terms) and usually a good idea if the article is a long one and splitting it up into sections is logically a good idea.

This of course means that you can get into a muddle with too many nested sections and articles within each other, but as with divitis, in general if that begins to happen you’re doing it wrong and need to go back and rethink your semantic structure.

Conclusion

I could have filled this article with many code examples, but ultimately you need to think about this one yourself as it’s your content and you need to think about how is should be presented semantically. There are no real hard and fast rules regarding using article and section, just guidelines to help you make an informed decision and you’ll make mistakes on the way and will learn from them (just as I and others have).

这里举出了两个例子
section的