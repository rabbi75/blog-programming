<?php include '../helpers/format.php';?>
 <?php
 	$tm = new format();
 ?>	
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Post List</h2>
            <div class="block">  
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width="5%">No.</th>
						<th width="15%">Post Title</th>
						<th width="20%">Description</th>
						<th width="10%">Category</th>
						<th width="10%">Image</th>
						<th width="10%">Author</th>
						<th width="10%">Tags</th>
						<th width="10%">Date</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT tbl_post.*, tbl_catagory.name FROM tbl_post INNER JOIN tbl_catagory ON tbl_post.cat = tbl_catagory.id ORDER By tbl_post.title DESC";
						$query = mysqli_query($con,$sql);
						if ($query) {
							$i=0;
							while ($result = mysqli_fetch_array($query)) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><a href="?page=editpost&amp;editpost=<?php echo $result['id'];?>"><?php echo $result['title']; ?></a></td>
						<td><?php echo $tm->textshorten($result['body'],40); ?></td>
						<td><?php echo $result['name'] ?></td>
						<td><img src="<?php echo $result['image']; ?>" height="60px" width="100px" ></td>
						<td><?php echo $result['author'] ?></td>
						<td><?php echo $result['tags'] ?></td>
						<td><?php echo $tm->formatDate($result['date']) ?></td>
						<td>
							<a href="?page=editpost&amp;editpost=<?php echo $result['id']?>">Edit</a> 
							||
							<a onclick ="return confirm('Are you sure to Delete..')" href="?page=delpost&amp;delpost=<?php echo $result['id']?>">Delete</a>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>

           </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>

