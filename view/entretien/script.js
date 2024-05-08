document.addEventListener('DOMContentLoaded', function() {
    const questionContainer = document.getElementById('questionContainer');
    const answerInput = document.getElementById('answer');
    const resultContainer = document.getElementById('resultContainer');
    const interviewForm = document.getElementById('interviewForm');
    const nextQuestionButton = document.getElementById('nextQuestionButton');

    // Charge une question d'entretien au chargement de la page
    fetchInterviewQuestion();

    // Soumet le formulaire
    interviewForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const userAnswer = answerInput.value.trim();
        evaluateAnswer(userAnswer);
    });

    // Bouton pour afficher une autre question
    nextQuestionButton.addEventListener('click', function() {
        fetchInterviewQuestion();
    });

    // Fonction pour charger une question d'entretien
    function fetchInterviewQuestion() {
        fetch('question.php')
            .then(response => response.json())
            .then(data => {
                questionContainer.textContent = data.question;
                answerInput.value = ''; // Efface la réponse précédente
                resultContainer.innerHTML = ''; // Efface les réponses précédentes
            })
            .catch(error => console.error('Error fetching interview question:', error));
    }

    // Fonction pour évaluer la réponse de l'utilisateur
    function evaluateAnswer(answer) {
        // Affiche la réponse de l'utilisateur
        resultContainer.innerHTML = `<p>Your answer:</p><p>${answer}</p>`;

        // Récupère la question posée
        const question = questionContainer.textContent.trim();

        // Objet contenant les réponses parfaites pour chaque question
        const perfectAnswers = {
            "Parlez-moi de vous.": "Votre réponse devrait fournir un bref aperçu de votre parcours professionnel, en mettant en évidence les expériences et les compétences pertinentes qui font de vous un candidat idéal pour le poste.",
            "Quels sont vos points forts et vos points faibles ?": "Pour les points forts, mettez l'accent sur des qualités pertinentes pour le poste et fournissez des exemples de la manière dont elles vous ont bénéficié par le passé. Pour les points faibles, soyez honnête mais choisissez quelque chose sur lequel vous travaillez activement pour vous améliorer.",
            "Pourquoi voulez-vous travailler pour cette entreprise ?":"Votre réponse devrait montrer que vous avez fait des recherches sur l'entreprise et que vous comprenez sa culture, ses valeurs et ses objectifs. Mettez en évidence ce qui vous attire spécifiquement vers cette entreprise.",
            "Pouvez-vous décrire un projet difficile sur lequel vous avez travaillé ?":"Sélectionnez un projet pertinent qui démontre votre capacité à gérer des défis et à trouver des solutions. Décrivez les difficultés rencontrées, les actions que vous avez prises et les résultats obtenus.",
            "Comment gérez-vous la pression ou les situations stressantes ?":"Expliquez vos stratégies pour rester calme et concentré sous pression, comme la gestion du temps, la priorisation des tâches et la communication efficace. Utilisez des exemples concrets de situations passées.",
            "Où vous voyez-vous dans cinq ans ?":"Montrez que vous avez des objectifs professionnels clairs et réalistes, en soulignant comment ce poste s'inscrit dans votre trajectoire de carrière. Évitez les réponses trop spécifiques ou déconnectées du poste actuel.",
            "Pourquoi devrions-nous vous embaucher ?":"Mettez en évidence vos réalisations passées, vos compétences pertinentes et votre passion pour le poste et l'entreprise. Fournissez des exemples spécifiques de votre valeur ajoutée.",
            "Comment réagissez-vous aux changements ?":"Démontrez votre adaptabilité et votre capacité à gérer efficacement les changements en milieu de travail. Utilisez des exemples pour montrer comment vous avez géré des situations de changement dans le passé.",
            
            // Ajoutez d'autres questions et réponses ici
        };

        // Vérifie si une réponse parfaite existe pour cette question
        if (perfectAnswers.hasOwnProperty(question)) {
            // Affiche la réponse parfaite correspondante dans le conteneur de résultats
            const perfectAnswer = perfectAnswers[question];
            resultContainer.innerHTML += `<p>Perfect answer:</p><p>${perfectAnswer}</p>`;
        } else {
            // Si aucune réponse parfaite n'est définie pour cette question, affiche un message par défaut
            resultContainer.innerHTML += "<p>No perfect answer defined for this question.</p>";
        }
    }
});
