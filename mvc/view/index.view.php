<h1>Utilisateurs</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Adresse</th>
                
            </tr>              
        </thead>
        
        <tbody>
            
            <?php
            foreach($users as $user) :
            ?>
            <tr>
                <td><?= $user->getId(); ?></td>
                <td><?= $user->getLastName(); ?></td>
                <td><?= $user->getFirstname(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getAddress(); ?></td>
            </tr>
            <?php
            endforeach;
            ?>
                    
        </tbody>
</table>

