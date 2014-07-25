<?php
/**
 */

function ioch_admin_settings_rooms_section_callback() {

    var_dump( ioch_api_call( '/1/rooms' ) );

    $label_name_h      = esc_html__( 'Name', IOCH_LANGUAGE_DOMAIN );
    $label_moderated_h = esc_html__( 'Moderated', IOCH_LANGUAGE_DOMAIN );
?>

    <table class="wp-list-table widefat fixed posts">
        <thead>
            <th scope="col" class="manage-column"><?php echo $label_name_h; ?></th>
            <th scope="col" class="manage-column"><?php echo $label_moderated_h; ?></th>
        </thead>

        <tfoot>
            <th scope="col" class="manage-column"><?php echo $label_name_h; ?></th>
            <th scope="col" class="manage-column"><?php echo $label_moderated_h; ?></th>
        </tfoot>

        <tbody id="the-list">
            <tr class="alternate">
                <td>my-room</td>
                <td>no</td>
            </tr>
            <tr>
                <td>my-room-2</td>
                <td>yes</td>
            </tr>
        </tbody>
    </table>

    <table style="display: none;" class="wp-list-table widefat fixed posts">
    <thead>
    <tr>
        <th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></th>
        <th scope="col" id="title" class="manage-column sortable desc" style=""><a href="http://totalerg.localhost/wp-admin/edit.php?orderby=title&amp;order=asc"><span>Name</span><span class="sorting-indicator"></span></a></th>
        <th scope="col" id="author" class="manage-column" style="">Moderated</th>
        <th scope="col" id="comments" class="manage-column column-comments num sortable desc" style=""><a href="http://totalerg.localhost/wp-admin/edit.php?orderby=comment_count&amp;order=asc"><span><span class="vers"><span title="Comments" class="comment-grey-bubble"></span></span></span><span class="sorting-indicator"></span></a></th>
        <th scope="col" id="date" class="manage-column column-date sortable asc" style=""><a href="http://totalerg.localhost/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Date</span><span class="sorting-indicator"></span></a></th>
    </tr>
    </thead>

    <tfoot>
    <tr>
        <th scope="col" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></th>
        <th scope="col" class="manage-column column-title sortable desc" style=""><a href="http://totalerg.localhost/wp-admin/edit.php?orderby=title&amp;order=asc"><span>Name</span><span class="sorting-indicator"></span></a></th>
        <th scope="col" class="manage-column" style="">Moderated</th>
        <th scope="col" class="manage-column column-comments num sortable desc" style=""><a href="http://totalerg.localhost/wp-admin/edit.php?orderby=comment_count&amp;order=asc"><span><span class="vers"><span title="Comments" class="comment-grey-bubble"></span></span></span><span class="sorting-indicator"></span></a></th>
        <th scope="col" class="manage-column column-date sortable asc" style=""><a href="http://totalerg.localhost/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Date</span><span class="sorting-indicator"></span></a></th>	</tr>
    </tfoot>

    <tbody id="the-list">
    <tr class="type-post status-draft format-standard has-post-thumbnail hentry category-uncategorized alternate iedit author-self level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-37126">Select video_066.mp4</label>
            <input id="cb-select-37126" type="checkbox" name="post[]" value="37126">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=37126&amp;action=edit" title="Edit “video_066.mp4”">my-room</a> - <span class="post-state">Draft</span></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=37126&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=37126&amp;action=trash&amp;_wpnonce=3c7e57ccf5">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=37126&amp;preview=true" title="Preview “video_066.mp4”" rel="permalink">Preview</a></span></div>
            <div class="hidden" id="inline_37126">
                <div class="post_title">video_066.mp4</div>
                <div class="post_name"></div>
                <div class="post_author">1</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">draft</div>
                <div class="jj">18</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">08</div>
                <div class="mn">23</div>
                <div class="ss">21</div>
                <div class="post_password"></div><div class="post_category" id="category_37126">1</div><div class="tags_input" id="post_tag_37126">Tag 1, Tag 2, Tag 3</div><div class="tags_input" id="toer_taxo_area_37126"></div><div class="tags_input" id="toer_taxo_business_unit_37126"></div><div class="tags_input" id="toer_taxo_channel_37126"></div><div class="tags_input" id="toer_taxo_network_37126"></div><div class="sticky"></div><div class="post_format"></div></div></td>
        <td class="author column-author"><a href="edit.php?post_type=post&amp;author=1">David R.</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=uncategorized">Uncategorized</a></td>
        <td class="tags column-tags"><a href="edit.php?tag=tag-1">Tag 1</a>, <a href="edit.php?tag=tag-2">Tag 2</a>, <a href="edit.php?tag=tag-3">Tag 3</a></td>
        <td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td>
        <td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>
        <td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=37126" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/18 8:23:21 AM">2014/07/18</abbr><br>Last Modified</td>		</tr>
    <tr id="post-10957" class="post-10957 type-post status-publish format-standard has-post-thumbnail hentry category-carte category-senza-categoria tag-carte-2 tag-catalogo-2014-2015 tag-nuovo-programma-box-piu tag-programma-fedelta  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-10957">Select Nuovo programma Box Più</label>
            <input id="cb-select-10957" type="checkbox" name="post[]" value="10957">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=10957&amp;action=edit" title="Edit “Nuovo programma Box Più”">Nuovo programma Box Più</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=10957&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=10957&amp;action=trash&amp;_wpnonce=adef14eb44">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=10957" title="View “Nuovo programma Box Più”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_10957">
                <div class="post_title">Nuovo programma Box Più</div>
                <div class="post_name">totalerg10_072014-mp4</div>
                <div class="post_author">6</div>
                <div class="comment_status">closed</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">14</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">16</div>
                <div class="mn">00</div>
                <div class="ss">01</div>
                <div class="post_password"></div><div class="post_category" id="category_10957">71,74</div><div class="tags_input" id="post_tag_10957">CARTE, catalogo 2014 /2015, Nuovo programma Box Più, Programma fedeltà</div><div class="tags_input" id="toer_taxo_area_10957"></div><div class="tags_input" id="toer_taxo_business_unit_10957"></div><div class="tags_input" id="toer_taxo_channel_10957"></div><div class="tags_input" id="toer_taxo_network_10957"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=carte">Carte</a>, <a href="edit.php?category_name=senza-categoria">Senza categoria</a></td><td class="tags column-tags"><a href="edit.php?tag=carte-2">CARTE</a>, <a href="edit.php?tag=catalogo-2014-2015">catalogo 2014 /2015</a>, <a href="edit.php?tag=nuovo-programma-box-piu">Nuovo programma Box Più</a>, <a href="edit.php?tag=programma-fedelta">Programma fedeltà</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=10957" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/14 4:00:01 PM">2014/07/14</abbr><br>Published</td>		</tr>
    <tr id="post-3632" class="post-3632 type-post status-publish format-standard has-post-thumbnail hentry category-senza-categoria alternate iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3632">Select Da Erg trovi il kit del tifoso. Corri a prenderlo…</label>
            <input id="cb-select-3632" type="checkbox" name="post[]" value="3632">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3632&amp;action=edit" title="Edit “Da Erg trovi il kit del tifoso. Corri a prenderlo…”">Da Erg trovi il kit del tifoso. Corri a prenderlo…</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3632&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3632&amp;action=trash&amp;_wpnonce=b5bc06d93d">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3632" title="View “Da Erg trovi il kit del tifoso. Corri a prenderlo…”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3632">
                <div class="post_title">Da Erg trovi il kit del tifoso. Corri a prenderlo...</div>
                <div class="post_name">da-erg-trovi-il-kit-del-tifoso-corri-a-prenderlo</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">16</div>
                <div class="mn">08</div>
                <div class="ss">39</div>
                <div class="post_password"></div><div class="post_category" id="category_3632">74</div><div class="tags_input" id="post_tag_3632"></div><div class="tags_input" id="toer_taxo_area_3632"></div><div class="tags_input" id="toer_taxo_business_unit_3632"></div><div class="tags_input" id="toer_taxo_channel_3632"></div><div class="tags_input" id="toer_taxo_network_3632"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=senza-categoria">Senza categoria</a></td><td class="tags column-tags">—</td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3632" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 4:08:39 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3633" class="post-3633 type-post status-publish format-standard has-post-thumbnail hentry category-carte  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3633">Select Area Più</label>
            <input id="cb-select-3633" type="checkbox" name="post[]" value="3633">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3633&amp;action=edit" title="Edit “Area Più”">Area Più</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3633&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3633&amp;action=trash&amp;_wpnonce=2ebf0a5953">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3633" title="View “Area Più”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3633">
                <div class="post_title">Area Più</div>
                <div class="post_name">area-piu</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">14</div>
                <div class="mn">24</div>
                <div class="ss">15</div>
                <div class="post_password"></div><div class="post_category" id="category_3633">71</div><div class="tags_input" id="post_tag_3633"></div><div class="tags_input" id="toer_taxo_area_3633"></div><div class="tags_input" id="toer_taxo_business_unit_3633"></div><div class="tags_input" id="toer_taxo_channel_3633"></div><div class="tags_input" id="toer_taxo_network_3633"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=carte">Carte</a></td><td class="tags column-tags">—</td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3633" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 2:24:15 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3631" class="post-3631 type-post status-publish format-standard has-post-thumbnail hentry category-carte tag-training-stories alternate iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3631">Select Programma Fedeltà: Cose Box Più</label>
            <input id="cb-select-3631" type="checkbox" name="post[]" value="3631">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3631&amp;action=edit" title="Edit “Programma Fedeltà: Cose Box Più”">Programma Fedeltà: Cose Box Più</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3631&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3631&amp;action=trash&amp;_wpnonce=9e33711fc1">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3631" title="View “Programma Fedeltà: Cose Box Più”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3631">
                <div class="post_title">Programma Fedeltà: Cose Box Più</div>
                <div class="post_name">programma-fedelta-cose-box-piu</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">22</div>
                <div class="ss">53</div>
                <div class="post_password"></div><div class="post_category" id="category_3631">71</div><div class="tags_input" id="post_tag_3631">Training Stories</div><div class="tags_input" id="toer_taxo_area_3631"></div><div class="tags_input" id="toer_taxo_business_unit_3631"></div><div class="tags_input" id="toer_taxo_channel_3631"></div><div class="tags_input" id="toer_taxo_network_3631"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=carte">Carte</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3631" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:22:53 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3630" class="post-3630 type-post status-publish format-standard has-post-thumbnail hentry category-mnp tag-training-stories  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3630">Select ERG Mobile: Portabilità</label>
            <input id="cb-select-3630" type="checkbox" name="post[]" value="3630">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3630&amp;action=edit" title="Edit “ERG Mobile: Portabilità”">ERG Mobile: Portabilità</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3630&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3630&amp;action=trash&amp;_wpnonce=55f6c8e3d2">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3630" title="View “ERG Mobile: Portabilità”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3630">
                <div class="post_title">ERG Mobile: Portabilità</div>
                <div class="post_name">erg-mobile-portabilita</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">22</div>
                <div class="ss">21</div>
                <div class="post_password"></div><div class="post_category" id="category_3630">58</div><div class="tags_input" id="post_tag_3630">Training Stories</div><div class="tags_input" id="toer_taxo_area_3630"></div><div class="tags_input" id="toer_taxo_business_unit_3630"></div><div class="tags_input" id="toer_taxo_channel_3630"></div><div class="tags_input" id="toer_taxo_network_3630"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=mnp">MNP</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3630" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:22:21 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3629" class="post-3629 type-post status-publish format-standard has-post-thumbnail hentry category-lubrificanti tag-training-stories alternate iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3629">Select Lubrificanti: come spingi la vendita dell’olio</label>
            <input id="cb-select-3629" type="checkbox" name="post[]" value="3629">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3629&amp;action=edit" title="Edit “Lubrificanti: come spingi la vendita dell’olio”">Lubrificanti: come spingi la vendita dell’olio</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3629&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3629&amp;action=trash&amp;_wpnonce=5ee7276310">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3629" title="View “Lubrificanti: come spingi la vendita dell’olio”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3629">
                <div class="post_title">Lubrificanti: come spingi la vendita dell'olio</div>
                <div class="post_name">lubrificanti-come-spingi-la-vendita-dellolio</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">21</div>
                <div class="ss">13</div>
                <div class="post_password"></div><div class="post_category" id="category_3629">73</div><div class="tags_input" id="post_tag_3629">Training Stories</div><div class="tags_input" id="toer_taxo_area_3629"></div><div class="tags_input" id="toer_taxo_business_unit_3629"></div><div class="tags_input" id="toer_taxo_channel_3629"></div><div class="tags_input" id="toer_taxo_network_3629"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=lubrificanti">Lubrificanti</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3629" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:21:13 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3628" class="post-3628 type-post status-publish format-standard has-post-thumbnail hentry category-sim tag-training-stories  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3628">Select Offerta Pacchetti ERG Mobile</label>
            <input id="cb-select-3628" type="checkbox" name="post[]" value="3628">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3628&amp;action=edit" title="Edit “Offerta Pacchetti ERG Mobile”">Offerta Pacchetti ERG Mobile</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3628&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3628&amp;action=trash&amp;_wpnonce=047e27b186">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3628" title="View “Offerta Pacchetti ERG Mobile”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3628">
                <div class="post_title">Offerta Pacchetti ERG Mobile</div>
                <div class="post_name">offerta-pacchetti-erg-mobile</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">20</div>
                <div class="ss">13</div>
                <div class="post_password"></div><div class="post_category" id="category_3628">57</div><div class="tags_input" id="post_tag_3628">Training Stories</div><div class="tags_input" id="toer_taxo_area_3628"></div><div class="tags_input" id="toer_taxo_business_unit_3628"></div><div class="tags_input" id="toer_taxo_channel_3628"></div><div class="tags_input" id="toer_taxo_network_3628"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=sim">SIM</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3628" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:20:13 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3627" class="post-3627 type-post status-publish format-standard has-post-thumbnail hentry category-carte alternate iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3627">Select La carta che usi per pagare da oggi può farti risparmiare…</label>
            <input id="cb-select-3627" type="checkbox" name="post[]" value="3627">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3627&amp;action=edit" title="Edit “La carta che usi per pagare da oggi può farti risparmiare…”">La carta che usi per pagare da oggi può farti risparmiare…</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3627&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3627&amp;action=trash&amp;_wpnonce=5ca68c8635">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3627" title="View “La carta che usi per pagare da oggi può farti risparmiare…”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3627">
                <div class="post_title">La carta che usi per pagare da oggi può farti risparmiare...</div>
                <div class="post_name">la-carta-che-usi-per-pagare-da-oggi-puo-farti-risparmiare</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">19</div>
                <div class="ss">23</div>
                <div class="post_password"></div><div class="post_category" id="category_3627">71</div><div class="tags_input" id="post_tag_3627"></div><div class="tags_input" id="toer_taxo_area_3627"></div><div class="tags_input" id="toer_taxo_business_unit_3627"></div><div class="tags_input" id="toer_taxo_channel_3627"></div><div class="tags_input" id="toer_taxo_network_3627"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=carte">Carte</a></td><td class="tags column-tags">—</td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3627" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:19:23 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3626" class="post-3626 type-post status-publish format-standard has-post-thumbnail hentry category-isp tag-training-stories  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3626">Select Che vantaggi ci sono ad attivare il Box Più sulla Carta Intesa Sanpaolo</label>
            <input id="cb-select-3626" type="checkbox" name="post[]" value="3626">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3626&amp;action=edit" title="Edit “Che vantaggi ci sono ad attivare il Box Più sulla Carta Intesa Sanpaolo”">Che vantaggi ci sono ad attivare il Box Più sulla Carta Intesa Sanpaolo</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3626&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3626&amp;action=trash&amp;_wpnonce=ae9235a59a">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3626" title="View “Che vantaggi ci sono ad attivare il Box Più sulla Carta Intesa Sanpaolo”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3626">
                <div class="post_title">Che vantaggi ci sono ad attivare il Box Più sulla Carta Intesa Sanpaolo</div>
                <div class="post_name">che-vantaggi-ci-sono-ad-attivare-il-box-piu-sulla-carta-intesa-sanpaolo</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">18</div>
                <div class="ss">58</div>
                <div class="post_password"></div><div class="post_category" id="category_3626">72</div><div class="tags_input" id="post_tag_3626">Training Stories</div><div class="tags_input" id="toer_taxo_area_3626"></div><div class="tags_input" id="toer_taxo_business_unit_3626"></div><div class="tags_input" id="toer_taxo_channel_3626"></div><div class="tags_input" id="toer_taxo_network_3626"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=isp">Loyalty</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3626" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:18:58 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3625" class="post-3625 type-post status-publish format-standard has-post-thumbnail hentry category-lubrificanti tag-training-stories alternate iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3625">Select Che vantaggi ha per te Excellium</label>
            <input id="cb-select-3625" type="checkbox" name="post[]" value="3625">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3625&amp;action=edit" title="Edit “Che vantaggi ha per te Excellium”">Che vantaggi ha per te Excellium</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3625&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3625&amp;action=trash&amp;_wpnonce=373d065b7b">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3625" title="View “Che vantaggi ha per te Excellium”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3625">
                <div class="post_title">Che vantaggi ha per te Excellium</div>
                <div class="post_name">che-vantaggi-ha-per-te-excellium</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">17</div>
                <div class="ss">06</div>
                <div class="post_password"></div><div class="post_category" id="category_3625">73</div><div class="tags_input" id="post_tag_3625">Training Stories</div><div class="tags_input" id="toer_taxo_area_3625"></div><div class="tags_input" id="toer_taxo_business_unit_3625"></div><div class="tags_input" id="toer_taxo_channel_3625"></div><div class="tags_input" id="toer_taxo_network_3625"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=lubrificanti">Lubrificanti</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3625" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:17:06 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3624" class="post-3624 type-post status-publish format-standard has-post-thumbnail hentry category-senza-categoria  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3624">Select Maurizio Libutti: Direttore Rete TotalErg</label>
            <input id="cb-select-3624" type="checkbox" name="post[]" value="3624">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3624&amp;action=edit" title="Edit “Maurizio Libutti: Direttore Rete TotalErg”">Maurizio Libutti: Direttore Rete TotalErg</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3624&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3624&amp;action=trash&amp;_wpnonce=4392073126">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3624" title="View “Maurizio Libutti: Direttore Rete TotalErg”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3624">
                <div class="post_title">Maurizio Libutti: Direttore Rete TotalErg</div>
                <div class="post_name">maurizio-libutti-direttore-rete-totalerg</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">15</div>
                <div class="ss">07</div>
                <div class="post_password"></div><div class="post_category" id="category_3624">74</div><div class="tags_input" id="post_tag_3624"></div><div class="tags_input" id="toer_taxo_area_3624"></div><div class="tags_input" id="toer_taxo_business_unit_3624"></div><div class="tags_input" id="toer_taxo_channel_3624"></div><div class="tags_input" id="toer_taxo_network_3624"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=senza-categoria">Senza categoria</a></td><td class="tags column-tags">—</td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3624" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:15:07 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3623" class="post-3623 type-post status-publish format-standard has-post-thumbnail hentry category-sim tag-training-stories alternate iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3623">Select SIM ERG Mobile: Come proponi la SIM</label>
            <input id="cb-select-3623" type="checkbox" name="post[]" value="3623">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3623&amp;action=edit" title="Edit “SIM ERG Mobile: Come proponi la SIM”">SIM ERG Mobile: Come proponi la SIM</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3623&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3623&amp;action=trash&amp;_wpnonce=52ec55c7cb">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3623" title="View “SIM ERG Mobile: Come proponi la SIM”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3623">
                <div class="post_title">SIM ERG Mobile: Come proponi la SIM</div>
                <div class="post_name">sim-erg-mobile-come-proponi-la-sim</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">11</div>
                <div class="ss">27</div>
                <div class="post_password"></div><div class="post_category" id="category_3623">57</div><div class="tags_input" id="post_tag_3623">Training Stories</div><div class="tags_input" id="toer_taxo_area_3623"></div><div class="tags_input" id="toer_taxo_business_unit_3623"></div><div class="tags_input" id="toer_taxo_channel_3623"></div><div class="tags_input" id="toer_taxo_network_3623"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=sim">SIM</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3623" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:11:27 PM">2014/07/10</abbr><br>Published</td>		</tr>
    <tr id="post-3622" class="post-3622 type-post status-publish format-standard has-post-thumbnail hentry category-carte tag-training-stories  iedit author-other level-0">
        <th scope="row" class="check-column">
            <label class="screen-reader-text" for="cb-select-3622">Select L’App TotalErg: i vantaggi</label>
            <input id="cb-select-3622" type="checkbox" name="post[]" value="3622">
            <div class="locked-indicator"></div>
        </th>
        <td class="post-title page-title column-title"><strong><a class="row-title" href="http://totalerg.localhost/wp-admin/post.php?post=3622&amp;action=edit" title="Edit “L’App TotalErg: i vantaggi”">L’App TotalErg: i vantaggi</a></strong>
            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
            <div class="row-actions"><span class="edit"><a href="http://totalerg.localhost/wp-admin/post.php?post=3622&amp;action=edit" title="Edit this item">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="http://totalerg.localhost/wp-admin/post.php?post=3622&amp;action=trash&amp;_wpnonce=7952c8cf0c">Trash</a> | </span><span class="view"><a href="http://totalerg.localhost/?p=3622" title="View “L’App TotalErg: i vantaggi”" rel="permalink">View</a></span></div>
            <div class="hidden" id="inline_3622">
                <div class="post_title">L'App TotalErg: i vantaggi</div>
                <div class="post_name">lapp-totalerg-i-vantaggi</div>
                <div class="post_author">6</div>
                <div class="comment_status">open</div>
                <div class="ping_status">open</div>
                <div class="_status">publish</div>
                <div class="jj">10</div>
                <div class="mm">07</div>
                <div class="aa">2014</div>
                <div class="hh">12</div>
                <div class="mn">10</div>
                <div class="ss">57</div>
                <div class="post_password"></div><div class="post_category" id="category_3622">71</div><div class="tags_input" id="post_tag_3622">Training Stories</div><div class="tags_input" id="toer_taxo_area_3622"></div><div class="tags_input" id="toer_taxo_business_unit_3622"></div><div class="tags_input" id="toer_taxo_channel_3622"></div><div class="tags_input" id="toer_taxo_network_3622"></div><div class="sticky"></div><div class="post_format"></div></div></td>			<td class="author column-author"><a href="edit.php?post_type=post&amp;author=6">David Riccitelli</a></td>
        <td class="categories column-categories"><a href="edit.php?category_name=carte">Carte</a></td><td class="tags column-tags"><a href="edit.php?tag=training-stories">Training Stories</a></td><td class="taxonomy-toer_taxo_area column-taxonomy-toer_taxo_area">—</td><td class="taxonomy-toer_taxo_business_unit column-taxonomy-toer_taxo_business_unit">—</td><td class="taxonomy-toer_taxo_channel column-taxonomy-toer_taxo_channel">—</td><td class="taxonomy-toer_taxo_network column-taxonomy-toer_taxo_network">—</td>			<td class="comments column-comments"><div class="post-com-count-wrapper">
                <a href="http://totalerg.localhost/wp-admin/edit-comments.php?p=3622" title="0 pending" class="post-com-count"><span class="comment-count">0</span></a>			</div></td>
        <td class="date column-date"><abbr title="2014/07/10 12:10:57 PM">2014/07/10</abbr><br>Published</td>		</tr>
    </tbody>
    </table>

<?php

}

