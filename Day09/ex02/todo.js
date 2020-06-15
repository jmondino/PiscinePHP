var i = 0;
var todos = new Array();
var rem = false;
window.onload = function() {
	if (document.cookie && document.cookie != "")
	{
		var cook = document.cookie;
		cook = trimChar (cook, '[');
		cook = trimChar (cook, ']');
		splited = cook.split(',');
		let i = -1;
		while (splited[++i])
		{
			splited[i] = trimChar (splited[i], '\"');
			if (splited[i] == "null")
				continue;
			add(splited[i]);
		}
	}
}

function add (str) {
	if (!str)
		str = prompt("Thing to add :");
	if (str)
	{
		if (rem)
		{
			i++;
			rem = false;
		}
		var div = document.createElement("div");
		div.setAttribute("id", i);
		div.setAttribute("class", "elemts");
		div.setAttribute("onclick", "ft_remove(this.id)");
		var node = document.createTextNode(str);
		div.appendChild(node);
		j = i - 1;
		first = document.getElementById(j);
		document.getElementById("ft_list").insertBefore(div, first);
		todos[i] = str;
		let list = JSON.stringify(todos);
		document.cookie = list;
		i++;
	}
}

function ft_remove (id) {
	var element = document.getElementById(id);
	var text = document.getElementById(id).innerText;
	if (confirm("Are you sure to delete this todo ?"))
	{
		var cook = document.cookie;
		var arr = new Array();
		var k = 0;
		var j = 0;
		while (todos[k])
		{
			if (text != todos[k])
				arr[j++] = todos[k];
			k++;
		}
		todos = arr;
		i = k - 1;
		let list = JSON.stringify(todos);
		document.cookie = list;
		element.remove();
		rem = true;
	}
}

function trimChar(string, charToRemove) {
    while(string.charAt(0)==charToRemove) {
        string = string.substring(1);
    }

    while(string.charAt(string.length-1)==charToRemove) {
        string = string.substring(0,string.length-1);
    }

    return string;
}