<h1>Help</h1>
<h1>Faq</h1>
<?php $i = 1; ?>
<p></p>
<div class="codediv">
<h2><?php echo $i++;?>.I could't add more master host?</h2>
    First and First,you must know:
        <ul>
        <li>Each partition has only <b>ONE</b> master.</li>
        <li>When a new  master host join the flare network,the flarei node mark up the master's state as <b>prepare</b>.You should change the state to 'active' manually.</li>
        <li>Partition number grows from 0,1,2,3.....more and more.</li>
        </ul>
</div>
<p></p>
<div class="codediv">
    <h2><?php echo $i++;?>.How many back-up copies of data the flare provide?</h2>
    In fact,it's you  that got the power to decide how many copies each data element got,not flare.
    All depends on how many slave hosts you give to each partition.
</div>
</ol>
