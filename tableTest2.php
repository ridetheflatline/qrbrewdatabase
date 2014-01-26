<script type="text/javascript">
onload=function()
{
	var nrCols=2;
	var maxRows=4;
	var nrRows=2;
	var root=document.getElementById('mydiv');
	var tab=document.createElement('table');
	tab.className="table table-striped";
	var tbo=document.createElement('tbody');
	var row, cell;
	for(var i=0;i<nrRows;i++)
	{
		row=document.createElement('tr');
		for(var j=0;j<nrCols;j++)
		{
			cell=document.createElement('td');
			cell.appendChild(document.createTextNode('edit me'))
			row.appendChild(cell);
		}
		tbo.appendChild(row);
	}
	tab.appendChild(tbo);
	root.appendChild(tab);
	}
</script>

<div id="mydiv"></div>

