<?php
$interviewQuestions = [
    "Parlez-moi de vous."=> "Votre réponse devrait fournir un bref aperçu de votre parcours professionnel, en mettant en évidence les expériences et les compétences pertinentes qui font de vous un candidat idéal pour le poste.",
            "Quels sont vos points forts et vos points faibles ?"=> "Pour les points forts, mettez l'accent sur des qualités pertinentes pour le poste et fournissez des exemples de la manière dont elles vous ont bénéficié par le passé. Pour les points faibles, soyez honnête mais choisissez quelque chose sur lequel vous travaillez activement pour vous améliorer.",
            "Pourquoi voulez-vous travailler pour cette entreprise ?"=>"Votre réponse devrait montrer que vous avez fait des recherches sur l'entreprise et que vous comprenez sa culture, ses valeurs et ses objectifs. Mettez en évidence ce qui vous attire spécifiquement vers cette entreprise.",
            "Pouvez-vous décrire un projet difficile sur lequel vous avez travaillé ?"=>"Sélectionnez un projet pertinent qui démontre votre capacité à gérer des défis et à trouver des solutions. Décrivez les difficultés rencontrées, les actions que vous avez prises et les résultats obtenus.",
            "Comment gérez-vous la pression ou les situations stressantes ?"=>"Expliquez vos stratégies pour rester calme et concentré sous pression, comme la gestion du temps, la priorisation des tâches et la communication efficace. Utilisez des exemples concrets de situations passées.",
            "Où vous voyez-vous dans cinq ans ?"=>"Montrez que vous avez des objectifs professionnels clairs et réalistes, en soulignant comment ce poste s'inscrit dans votre trajectoire de carrière. Évitez les réponses trop spécifiques ou déconnectées du poste actuel.",
            "Pourquoi devrions-nous vous embaucher ?"=>"Mettez en évidence vos réalisations passées, vos compétences pertinentes et votre passion pour le poste et l'entreprise. Fournissez des exemples spécifiques de votre valeur ajoutée.",
            "Comment réagissez-vous aux changements ?"=>"Démontrez votre adaptabilité et votre capacité à gérer efficacement les changements en milieu de travail. Utilisez des exemples pour montrer comment vous avez géré des situations de changement dans le passé.",
            // Ajoutez d'autres questions et réponses ici
];

// Sélectionne une question aléatoire
$randomQuestion = array_rand($interviewQuestions);
$question = ['question' => $randomQuestion, 'perfect_answer' => $interviewQuestions[$randomQuestion]];
echo json_encode($question);
?>
